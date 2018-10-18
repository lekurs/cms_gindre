<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 12:32
 */

namespace App\UI\Action\Back;


use App\Domain\Form\RoleCreationForm;
use App\Domain\Handler\Interfaces\CreationRoleFormHandlerInterface;
use App\UI\Action\Interfaces\RoleCreationActionInterface;
use App\UI\Responder\Interfaces\RoleCreationResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RoleCreationAction implements RoleCreationActionInterface
{
    /**
     * @var CreationRoleFormHandlerInterface
     */
    private $roleFormHandler;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * RoleCreationAction constructor.
     * @param CreationRoleFormHandlerInterface $roleFormHandler
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(CreationRoleFormHandlerInterface $roleFormHandler, FormFactoryInterface $formFactory)
    {
        $this->roleFormHandler = $roleFormHandler;
        $this->formFactory = $formFactory;
    }


    /**
     * @Route(name="creationRole", path="admin/contact/role/add")
     * @param Request $request
     * @param RoleCreationResponderInterface $responder
     * @return Response
     */
    public function show(Request $request, RoleCreationResponderInterface $responder): Response
    {
        $form = $this->formFactory->create(RoleCreationForm::class)->handleRequest($request);

        if ($this->roleFormHandler->handle($form)) {

            return $responder->response(true, null);
        }

        return $responder->response(false, $form);
    }
}
