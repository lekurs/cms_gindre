<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 11:59
 */

namespace App\UI\Action\Interfaces;


use App\Domain\Handler\Interfaces\CreationProductTypeFormHandlerInterface;
use App\UI\Responder\Interfaces\ProductTypeCreationResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface ProductTypeCreationActionInterface
{
    /**
     * ProductTypeCreationActionInterface constructor.
     *
     * @param FormFactoryInterface $formFactory
     * @param CreationProductTypeFormHandlerInterface $creationProductTypeFormHandler
     */
    public function __construct(FormFactoryInterface $formFactory, CreationProductTypeFormHandlerInterface $creationProductTypeFormHandler);

    /**
     * @param Request $request
     * @param ProductTypeCreationResponderInterface $responder
     * @return Response
     */
    public function show(Request $request, ProductTypeCreationResponderInterface $responder): Response;
}
