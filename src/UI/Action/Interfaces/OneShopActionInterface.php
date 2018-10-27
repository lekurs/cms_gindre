<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 22/09/2018
 * Time: 15:23
 */

namespace App\UI\Action\Interfaces;


use App\Domain\Handler\Interfaces\CreationContactFormHandlerInterface;
use App\Domain\Handler\Interfaces\CreationMessageFormHandlerInterface;
use App\Domain\Repository\Interfaces\CommandeRepositoryInterface;
use App\Domain\Repository\Interfaces\ContactRepositoryInterface;
use App\Domain\Repository\Interfaces\ShopRepositoryInterface;
use App\UI\Responder\Interfaces\OneShopResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface OneShopActionInterface
{
    /**
     * OneShopActionInterface constructor.
     *
     * @param ShopRepositoryInterface $shopRepo
     * @param ContactRepositoryInterface $contactRepo
     * @param CommandeRepositoryInterface $commandeRepo
     * @param FormFactoryInterface $formFactory
     * @param CreationMessageFormHandlerInterface $creationMessageFormHandler
     * @param CreationContactFormHandlerInterface $formContactHandler
     */
    public function __construct(
        ShopRepositoryInterface $shopRepo,
        ContactRepositoryInterface $contactRepo,
        CommandeRepositoryInterface $commandeRepo,
        FormFactoryInterface $formFactory,
        CreationMessageFormHandlerInterface $creationMessageFormHandler,
        CreationContactFormHandlerInterface $formContactHandler
    );

    /**
     * @param Request $request
     * @param OneShopResponderInterface $responder
     * @return Response
     */
    public function show(Request $request, OneShopResponderInterface $responder): Response;
}
