<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 12:32
 */

namespace App\UI\Action\Back;


use App\Domain\Form\CreationRoleForm;
use App\Domain\Handler\Interfaces\CreationRoleFormHandlerInterface;
use App\UI\Action\Interfaces\CreationRoleActionInterface;
use App\UI\Responder\Interfaces\CreationRoleResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreationRoleAction implements CreationRoleActionInterface
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
     * CreationRoleAction constructor.
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
     * @param CreationRoleResponderInterface $responder
     * @return Response
     */
    public function show(Request $request, CreationRoleResponderInterface $responder): Response
    {
        $form = $this->formFactory->create(CreationRoleForm::class)->handleRequest($request);

        if ($this->roleFormHandler->handle($form)) {

            return $responder->response(true, null);
        }

        return $responder->response(false, $form);
    }
}
