<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 15/10/2018
 * Time: 21:32
 */

namespace App\UI\Action\Back;


use App\Domain\Models\Shop;
use App\Domain\Repository\Interfaces\ShopRepositoryInterface;
use App\UI\Action\Interfaces\AdminActionInterface;
use App\UI\Responder\Interfaces\AdminResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminAction implements AdminActionInterface
{
    /**
     * @var ShopRepositoryInterface
     */
    private $shopRepo;

    /**
     * AdminAction constructor.
     * @param ShopRepositoryInterface $shopRepo
     */
    public function __construct(ShopRepositoryInterface $shopRepo)
    {
        $this->shopRepo = $shopRepo;
    }

    /**
     * @Route(name="admin", path="admin")
     * @param AdminResponderInterface $responder
     * @return Response
     */
    public function adminIndex(AdminResponderInterface $responder): Response
    {
        $shops = array_map(function (Shop $shop) { return $shop;}, $this->shopRepo->getAll());

        return $responder->response($shops);
    }
}
