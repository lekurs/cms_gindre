<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 11:59
 */

namespace App\UI\Action\Back;


use App\Domain\Form\CreationProductTypeForm;
use App\Domain\Handler\Interfaces\CreationContactTypeFormHandlerInterface;
use App\Domain\Handler\Interfaces\CreationProductTypeFormHandlerInterface;
use App\UI\Action\Interfaces\CreationProductTypeActionInterface;
use App\UI\Responder\Interfaces\CreationProductTypeResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreationProductTypeAction implements CreationProductTypeActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var CreationProductTypeFormHandlerInterface
     */
    private $productTypeFormHandler;

    /**
     * CreationProductTypeAction constructor.
     *
     * @param FormFactoryInterface $formFactory
     * @param CreationProductTypeFormHandlerInterface $productTypeFormHandler
     */
    public function __construct(FormFactoryInterface $formFactory, CreationProductTypeFormHandlerInterface $productTypeFormHandler)
    {
        $this->formFactory = $formFactory;
        $this->productTypeFormHandler = $productTypeFormHandler;
    }

    /**
     * @Route(name="creationProductType", path="admin/product/type/add")
     * @param Request $request
     * @param CreationProductTypeResponderInterface $responder
     * @return Response
     */
    public function show(Request $request, CreationProductTypeResponderInterface $responder): Response
    {
        $form = $this->formFactory->create(CreationProductTypeForm::class)->handleRequest($request);

        if ($this->productTypeFormHandler->handle($form)) {

            return $responder->response(true, null);
        }

        return $responder->response(false, $form);
    }


}