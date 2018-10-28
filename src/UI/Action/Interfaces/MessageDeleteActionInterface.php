<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 28/10/2018
 * Time: 12:08
 */

namespace App\UI\Action\Interfaces;


use App\Domain\Repository\Interfaces\MessageRepositoryInterface;
use App\UI\Responder\Interfaces\MessageDeleteResponderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

interface MessageDeleteActionInterface
{
    /**
     * MessageDeleteActionInterface constructor.
     *
     * @param MessageRepositoryInterface $messageRepo
     */
    public function __construct(MessageRepositoryInterface $messageRepo);

    /**
     * @param Request $request
     * @param MessageDeleteResponderInterface $responder
     * @return JsonResponse
     */
    public function delete(Request $request, MessageDeleteResponderInterface $responder): JsonResponse;
}
