<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 22/10/2018
 * Time: 21:59
 */

namespace App\UI\Action\Interfaces;


use App\Domain\Handler\Interfaces\CommandeCreationFormHandlerInterface;
use App\Domain\Repository\Interfaces\ShopRepositoryInterface;
use App\UI\Responder\Interfaces\CommandeCreationResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface CommandeCreationActionInterface
{
    /**
     * CommandeCreationActionInterface constructor.
     *
     * @param FormFactoryInterface $formFactory
     * @param ShopRepositoryInterface $shopRepo
     * @param CommandeCreationFormHandlerInterface $commandeCreationFormHandler
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        ShopRepositoryInterface $shopRepo,
        CommandeCreationFormHandlerInterface $commandeCreationFormHandler
    );

    /**
     * @param Request $request
     * @param CommandeCreationResponderInterface $responder
     * @return Response
     */
    public function show(Request $request, CommandeCreationResponderInterface $responder): Response;
}
