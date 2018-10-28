<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 13:53
 */

namespace App\UI\Action\Back;


use App\Domain\Form\ShopCreationForm;
use App\Domain\Handler\Interfaces\CreationShopFormHandlerInterface;
use App\UI\Action\Interfaces\ShopCreationActionInterface;
use App\UI\Responder\Interfaces\ShopCreationResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShopActionCreation implements ShopCreationActionInterface
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
     * ShopActionCreation constructor.
     *
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
     *
     * @Security("is_granted('ROLE_ADMIN')")
     *
     * @param Request $request
     * @param ShopCreationResponderInterface $responder
     * @return Response
     */
    public function show(Request $request, ShopCreationResponderInterface $responder): Response
    {
        $form = $this->formFactory->create(ShopCreationForm::class)->handleRequest($request);

        if ($this->creationShopFormHandler->handle($form)) {

            return $responder->response(true, null);
        }
        return $responder->response(false, $form);
    }
}
