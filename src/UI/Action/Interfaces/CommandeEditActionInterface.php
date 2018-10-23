<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 22/10/2018
 * Time: 23:39
 */

namespace App\UI\Action\Interfaces;


use App\Domain\Handler\Interfaces\CommandeEditFormHandlerInterface;
use App\Domain\Repository\Interfaces\CommandeRepositoryInterface;
use App\UI\Responder\Interfaces\CommandeEditResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface CommandeEditActionInterface
{
    /**
     * CommandeEditActionInterface constructor.
     *
     * @param FormFactoryInterface $formFactory
     * @param CommandeRepositoryInterface $commandeRepo
     * @param CommandeEditFormHandlerInterface $commandeEditFormHandler
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        CommandeRepositoryInterface $commandeRepo,
        CommandeEditFormHandlerInterface $commandeEditFormHandler
    );

    /**
     * @param Request $request
     * @param CommandeEditResponderInterface $responder
     * @return Response
     */
    public function edit(Request $request, CommandeEditResponderInterface $responder): Response;
}
