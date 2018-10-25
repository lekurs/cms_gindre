<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 11:15
 */

namespace App\UI\Action\Back;


use App\Domain\Form\ContactTypeCreationForm;
use App\Domain\Handler\Interfaces\CreationContactTypeFormHandlerInterface;
use App\UI\Action\Interfaces\ContactTypeCreationActionInterface;
use App\UI\Responder\Interfaces\ContactTypeCreationResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactTypeCreationAction implements ContactTypeCreationActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var CreationContactTypeFormHandlerInterface
     */
    private $contactTypeHandler;

    /**
     * ContactTypeCreationAction constructor.
     * @param FormFactoryInterface $formFactory
     * @param CreationContactTypeFormHandlerInterface $contactTypeHandler
     */
    public function __construct(FormFactoryInterface $formFactory, CreationContactTypeFormHandlerInterface $contactTypeHandler)
    {
        $this->formFactory = $formFactory;
        $this->contactTypeHandler = $contactTypeHandler;
    }

    /**
     * @Route(name="CreationContactType", path="/admin/contact/type/add")
     * @param ContactTypeCreationResponderInterface $responder
     * @param Request $request
     * @return Response
     */
    public function show(Request $request, ContactTypeCreationResponderInterface $responder): Response
    {
        $form = $this->formFactory->create(ContactTypeCreationForm::class)->handleRequest($request);

        if ($this->contactTypeHandler->handle($form)) {

            return $responder->response(true, null);
        }

        return $responder->response(false, $form);
    }
}
