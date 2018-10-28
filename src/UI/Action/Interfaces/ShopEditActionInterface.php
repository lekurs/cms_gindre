<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 28/10/2018
 * Time: 10:59
 */

namespace App\UI\Action\Interfaces;


use App\Domain\Handler\Interfaces\ShopEditFormHandlerInterface;
use App\Domain\Repository\Interfaces\ShopRepositoryInterface;
use App\UI\Responder\Interfaces\ShopEditResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface ShopEditActionInterface
{
    /**
     * ShopEditActionInterface constructor.
     *
     * @param FormFactoryInterface $formFactory
     * @param ShopRepositoryInterface $shopRepo
     * @param ShopEditFormHandlerInterface $shopEditFormHandler
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        ShopRepositoryInterface $shopRepo,
        ShopEditFormHandlerInterface $shopEditFormHandler
    );

    /**
     * @param Request $request
     * @param ShopEditResponderInterface $responder
     * @return Response
     */
    public function edit(Request $request, ShopEditResponderInterface $responder): Response;
}
