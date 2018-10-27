<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 22/09/2018
 * Time: 15:09
 */

namespace App\UI\Action\Interfaces;


use App\Domain\Handler\Interfaces\CreationStatusShopHandlerInterface;
use App\UI\Responder\Interfaces\StatutShopCreationResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface StatusShopCreationActionInterface
{
    /**
     * StatusShopCreationActionInterface constructor.
     *
     * @param FormFactoryInterface $formFactory
     * @param CreationStatusShopHandlerInterface $creationStatusShopHandler
     */
    public function __construct(FormFactoryInterface $formFactory, CreationStatusShopHandlerInterface $creationStatusShopHandler);

    /**
     * @param Request $request
     * @param StatutShopCreationResponderInterface $responder
     * @return Response
     */
    public function show(Request $request, StatutShopCreationResponderInterface $responder): Response;
}
