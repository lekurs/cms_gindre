<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 25/10/2018
 * Time: 16:21
 */

namespace App\UI\Action\Interfaces;


use App\Domain\Handler\Interfaces\CreationContactTypeFormHandlerInterface;
use App\UI\Responder\Interfaces\ContactTypeCreationResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface ContactTypeCreationActionInterface
{
    /**
     * ContactTypeCreationActionInterface constructor.
     *
     * @param FormFactoryInterface $formFactory
     * @param CreationContactTypeFormHandlerInterface $contactTypeHandler
     */
    public function __construct(FormFactoryInterface $formFactory, CreationContactTypeFormHandlerInterface $contactTypeHandler);

    /**
     * @param Request $request
     * @param ContactTypeCreationResponderInterface $responder
     * @return Response
     */
    public function show(Request $request, ContactTypeCreationResponderInterface $responder): Response;
}
