<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 22/09/2018
 * Time: 15:08
 */

namespace App\UI\Action\Back;


use App\Domain\Form\CreationStatusShopForm;
use App\Domain\Handler\Interfaces\CreationStatusShopHandlerInterface;
use App\UI\Action\Interfaces\CreationStatusShopActionInterface;
use App\UI\Responder\Interfaces\CreationStatutShopResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreationStatusShopAction implements CreationStatusShopActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var CreationStatusShopHandlerInterface
     */
    private $creationStatusShopHandler;

    /**
     * CreationStatusShopAction constructor.
     * @param FormFactoryInterface $formFactory
     * @param CreationStatusShopHandlerInterface $creationStatusShopHandler
     */
    public function __construct(FormFactoryInterface $formFactory, CreationStatusShopHandlerInterface $creationStatusShopHandler)
    {
        $this->formFactory = $formFactory;
        $this->creationStatusShopHandler = $creationStatusShopHandler;
    }

    /**
     * @Route(name="creationStatusShop", path="admin/shop/status/add")
     * @param Request $request
     * @param CreationStatutShopResponderInterface $responder
     * @return Response
     */
    public function show(Request $request, CreationStatutShopResponderInterface $responder): Response
    {
        $form = $this->formFactory->create(CreationStatusShopForm::class)->handleRequest($request);

        if ($this->creationStatusShopHandler->handle($form)) {
            return $responder->response(true, null);
        }

        return $responder->response(false, $form);
    }

}