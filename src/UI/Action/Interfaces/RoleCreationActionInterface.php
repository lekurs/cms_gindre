<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 12:32
 */

namespace App\UI\Action\Interfaces;


use App\Domain\Handler\Interfaces\CreationRoleFormHandlerInterface;
use App\UI\Responder\Interfaces\RoleCreationResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface RoleCreationActionInterface
{
    /**
     * RoleCreationActionInterface constructor.
     *
     * @param CreationRoleFormHandlerInterface $roleFormHandler
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(CreationRoleFormHandlerInterface $roleFormHandler, FormFactoryInterface $formFactory);

    /**
     * @param Request $request
     * @param RoleCreationResponderInterface $responder
     * @return Response
     */
    public function show(Request $request, RoleCreationResponderInterface $responder): Response;
}
