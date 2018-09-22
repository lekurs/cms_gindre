<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 22/09/2018
 * Time: 15:23
 */

namespace App\UI\Action\Back;


use App\Domain\Repository\Interfaces\ShopRepositoryInterface;
use App\UI\Action\Interfaces\ShowShopActionInterface;
use App\UI\Responder\Interfaces\ShowShopResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowShopAction implements ShowShopActionInterface
{
    /**
     * @var ShopRepositoryInterface
     */
    private $shopRepo;

    /**
     * ShowShopAction constructor.
     * @param ShopRepositoryInterface $shopRepo
     */
    public function __construct(ShopRepositoryInterface $shopRepo)
    {
        $this->shopRepo = $shopRepo;
    }

    /**
     * @Route(name="showOneShop", path="admin/shop/{slug}")
     * @param Request $request
     * @param ShowShopResponderInterface $responder
     * @return Response
     */
    public function show(Request $request, ShowShopResponderInterface $responder): Response
    {
        $shop = $this->shopRepo->getOne($request->attributes->get('slug'));

        $responder->response($shop);
    }
}