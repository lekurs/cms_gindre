<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 18/10/2018
 * Time: 20:55
 */

namespace App\UI\Action\Interfaces;


use App\Domain\Handler\Interfaces\MessageEditHandlerInterface;
use App\Domain\Repository\Interfaces\MessageRepositoryInterface;
use App\UI\Responder\Interfaces\MessageEditResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface MessageEditActionInterface
{
    /**
     * MessageEditActionInterface constructor.
     *
     * @param MessageRepositoryInterface $messageRepo
     * @param MessageEditHandlerInterface $messageEditHandler
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(
        MessageRepositoryInterface $messageRepo,
        MessageEditHandlerInterface $messageEditHandler,
        FormFactoryInterface $formFactory
    );

    /**
     * @param Request $request
     * @param MessageEditResponderInterface $responder
     * @return Response
     */
    public function edit(Request $request, MessageEditResponderInterface $responder): Response;
}
