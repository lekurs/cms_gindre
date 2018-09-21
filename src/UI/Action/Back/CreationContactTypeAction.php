<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 11:15
 */

namespace App\UI\Action\Back;


use App\Domain\Form\CreationContactTypeForm;
use App\Domain\Handler\Interfaces\CreationContactTypeFormHandlerInterface;
use App\UI\Responder\Interfaces\CreationContactTypeResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreationContactTypeAction
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
     * CreationContactTypeAction constructor.
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
     * @param Request $request
     * @return Response
     */
    public function show(Request $request, CreationContactTypeResponderInterface $responder): Response
    {
        $form = $this->formFactory->create(CreationContactTypeForm::class)->handleRequest($request);

        if ($this->contactTypeHandler->handle($form)) {

            return $responder->response(true, null);
        }

        return $responder->response(false, $form);
    }


}