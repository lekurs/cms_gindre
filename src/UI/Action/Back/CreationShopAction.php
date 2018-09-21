<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 13:53
 */

namespace App\UI\Action\Back;


use App\Domain\Form\CreationShopForm;
use App\Domain\Handler\Interfaces\CreationShopFormHandlerInterface;
use App\UI\Action\Interfaces\CreationShopActionInterface;
use App\UI\Responder\Interfaces\CreationShopResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreationShopAction implements CreationShopActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var CreationShopFormHandlerInterface
     */
    private $creationShopFormHandler;

    /**
     * CreationShopAction constructor.
     * @param FormFactoryInterface $formFactory
     * @param CreationShopFormHandlerInterface $creationShopFormHandler
     */
    public function __construct(FormFactoryInterface $formFactory, CreationShopFormHandlerInterface $creationShopFormHandler)
    {
        $this->formFactory = $formFactory;
        $this->creationShopFormHandler = $creationShopFormHandler;
    }

    /**
     * @Route(name="creationShop", path="admin/shop/add")
     * @param Request $request
     * @param CreationShopResponderInterface $responder
     * @return Response
     */
    public function show(Request $request, CreationShopResponderInterface $responder): Response
    {
        $form = $this->formFactory->create(CreationShopForm::class)->handleRequest($request);

        if ($this->creationShopFormHandler->handle($form)) {

            return $responder->response(true, null);
        }
        return $responder->response(false, $form);
    }

}