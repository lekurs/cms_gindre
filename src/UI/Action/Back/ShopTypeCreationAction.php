<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 29/10/2018
 * Time: 17:06
 */

namespace App\UI\Action\Back;


use App\Domain\Form\ShopTypeCreationForm;
use App\Domain\Handler\Interfaces\ShopTypeCreationFormHandlerInterface;
use App\UI\Action\Interfaces\ShopTypeCreationActionInterface;
use App\UI\Responder\Interfaces\ShopTypeCreationResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ShopTypeCreationAction implements ShopTypeCreationActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var ShopTypeCreationFormHandlerInterface
     */
    private $shopTypeCreationFormHandler;

    /**
     * ShopTypeCreationAction constructor.
     * @param FormFactoryInterface $formFactory
     * @param ShopTypeCreationFormHandlerInterface $shopTypeCreationFormHandler
     */
    public function __construct(FormFactoryInterface $formFactory, ShopTypeCreationFormHandlerInterface $shopTypeCreationFormHandler)
    {
        $this->formFactory = $formFactory;
        $this->shopTypeCreationFormHandler = $shopTypeCreationFormHandler;
    }

    /**
     * @Route(name="shopTypeCreation", path="admin/shop/shoptype/add")
     *
     * @Security("is_granted('ROLE_ADMIN')")
     * @param Request $request
     * @param ShopTypeCreationResponderInterface $responder
     * @return Response
     */
    public function show(Request $request, ShopTypeCreationResponderInterface $responder): Response
    {
        $form = $this->formFactory->create(ShopTypeCreationForm::class)->handleRequest($request);

        if ($this->shopTypeCreationFormHandler->handle($form)) {

            return $responder->response(true, null);
        }

        return $responder->response(false, $form);
    }
}