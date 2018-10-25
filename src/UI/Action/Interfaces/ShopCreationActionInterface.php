<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 13:53
 */

namespace App\UI\Action\Interfaces;


use App\Domain\Handler\Interfaces\CreationShopFormHandlerInterface;
use App\UI\Responder\Interfaces\ShopCreationResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface ShopCreationActionInterface
{
    /**
     * ShopCreationActionInterface constructor.
     *
     * @param FormFactoryInterface $formFactory
     * @param CreationShopFormHandlerInterface $creationShopFormHandler
     */
    public function __construct(FormFactoryInterface $formFactory, CreationShopFormHandlerInterface $creationShopFormHandler);

    /**
     * @param Request $request
     * @param ShopCreationResponderInterface $responder
     * @return Response
     */
    public function show(Request $request, ShopCreationResponderInterface $responder): Response;
}
