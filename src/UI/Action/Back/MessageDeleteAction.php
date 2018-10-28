<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 28/10/2018
 * Time: 12:08
 */

namespace App\UI\Action\Back;


use App\Domain\Repository\Interfaces\MessageRepositoryInterface;
use App\UI\Action\Interfaces\MessageDeleteActionInterface;
use App\UI\Responder\Interfaces\MessageDeleteResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class MessageDeleteAction implements MessageDeleteActionInterface
{
    /**
     * @var MessageRepositoryInterface
     */
    private $messageRepo;

    /**
     * MessageDeleteAction constructor.
     * @param MessageRepositoryInterface $messageRepo
     */
    public function __construct(MessageRepositoryInterface $messageRepo)
    {
        $this->messageRepo = $messageRepo;
    }

    /**
     * @Route(name="deleteMessage", path="admin/shop/one/message/del/{id}")
     * @Security("has_role('ROLE_ADMIN')")
     * @param Request $request
     * @param MessageDeleteResponderInterface $responder
     * @return JsonResponse
     */
    public function delete(Request $request, MessageDeleteResponderInterface $responder): JsonResponse
    {
        $message = $this->messageRepo->getOne($request->attributes->get('id'));

        $this->messageRepo->delete($message);

        return $responder->response();
    }
}
