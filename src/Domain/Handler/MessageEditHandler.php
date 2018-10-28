<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 18/10/2018
 * Time: 20:33
 */

namespace App\Domain\Handler;


use App\Domain\Handler\Interfaces\MessageEditHandlerInterface;
use App\Domain\Models\Message;
use App\Domain\Repository\Interfaces\MessageRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class MessageEditHandler implements MessageEditHandlerInterface
{
    /**
     * @var MessageRepositoryInterface
     */
    private $messageRepo;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * MessageEditHandler constructor.
     *
     * @param MessageRepositoryInterface $messageRepo
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(
        MessageRepositoryInterface $messageRepo,
        SessionInterface $session,
        ValidatorInterface $validator
    ) {
        $this->messageRepo = $messageRepo;
        $this->session = $session;
        $this->validator = $validator;
    }

    public function handle(FormInterface $form, Message $message): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {
            $messageEdit = $message->editMessage($form->getData());

//            $this->validator->validate($messageEdit, [], [
//                'message_edit_validator'
//            ]);

            $this->messageRepo->edit();

            $this->session->getFlashBag()->add('success', 'Message mis à jour');

            return true;
        }

        return false;
    }
}
