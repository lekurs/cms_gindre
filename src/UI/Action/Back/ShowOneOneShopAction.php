<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 22/09/2018
 * Time: 15:23
 */

namespace App\UI\Action\Back;


use App\Domain\Form\CreationMessageForm;
use App\Domain\Handler\Interfaces\CreationMessageFormHandlerInterface;
use App\Domain\Repository\Interfaces\ShopRepositoryInterface;
use App\UI\Action\Interfaces\ShowOneShopActionInterface;
use App\UI\Responder\Interfaces\ShowShopResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowOneOneShopAction implements ShowOneShopActionInterface
{
    /**
     * @var ShopRepositoryInterface
     */
    private $shopRepo;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var CreationMessageFormHandlerInterface
     */
    private $formHandler;

    /**
     * ShowOneOneShopAction constructor.
     * @param ShopRepositoryInterface $shopRepo
     * @param FormFactoryInterface $formFactory
     * @param CreationMessageFormHandlerInterface $formHandler
     */
    public function __construct(
        ShopRepositoryInterface $shopRepo,
        FormFactoryInterface $formFactory,
        CreationMessageFormHandlerInterface $formHandler
    ) {
        $this->shopRepo = $shopRepo;
        $this->formFactory = $formFactory;
        $this->formHandler = $formHandler;
    }


    /**
     * @Route(name="showOneShop", path="admin/shop/one/{slug}")
     * @param Request $request
     * @param ShowShopResponderInterface $responder
     * @return Response
     */
    public function show(Request $request, ShowShopResponderInterface $responder): Response
    {
        $shop = $this->shopRepo->getOne($request->attributes->get('slug'));

        $form = $this->formFactory->create(CreationMessageForm::class)->handleRequest($request);

        if ($this->formHandler->handle($form, $shop)) {

            return $responder->response(true, null, $shop);
        }

        return $responder->response(false, $form, $shop);
    }
}