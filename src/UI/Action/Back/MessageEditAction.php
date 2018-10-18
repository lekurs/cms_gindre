<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 18/10/2018
 * Time: 20:55
 */

namespace App\UI\Action\Back;


use App\Domain\DTO\MessageEditDTO;
use App\Domain\Form\MessageEditForm;
use App\Domain\Handler\Interfaces\MessageEditHandlerInterface;
use App\Domain\Repository\Interfaces\MessageRepositoryInterface;
use App\UI\Action\Interfaces\MessageEditActionInterface;
use App\UI\Responder\Interfaces\MessageEditResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessageEditAction implements MessageEditActionInterface
{
    /**
     * @var MessageRepositoryInterface
     */
    private $messageRepo;

    /**
     * @var MessageEditHandlerInterface
     */
    private $messageEditHandler;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * MessageEditAction constructor.
     *
     * @param MessageRepositoryInterface $messageRepo
     * @param MessageEditHandlerInterface $messageEditHandler
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(
        MessageRepositoryInterface $messageRepo,
        MessageEditHandlerInterface $messageEditHandler,
        FormFactoryInterface $formFactory
    ) {
        $this->messageRepo = $messageRepo;
        $this->messageEditHandler = $messageEditHandler;
        $this->formFactory = $formFactory;
    }

    /**
     * @Route(name="editMessage", path="admin/shop/one/edit/message/{id}")
     * @param Request $request
     * @param MessageEditResponderInterface $responder
     * @return Response
     */
    public function edit(Request $request, MessageEditResponderInterface $responder): Response
    {
        $message = $this->messageRepo->getOne($request->attributes->get('id'));

        $editMessage = new MessageEditDTO($message->getMessage());

        $form = $this->formFactory->create(MessageEditForm::class, $editMessage)->handleRequest($request);

        if ($this->messageEditHandler->handle($form, $message)) {

            return $responder->response(true, $form, $message->getShop(), $message);
        }

        return $responder->response(false, $form, null, $message);
    }
}
