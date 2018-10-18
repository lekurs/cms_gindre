<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 22/09/2018
 * Time: 15:29
 */

namespace App\UI\Action\Back;


use App\Domain\Repository\Interfaces\ShopRepositoryInterface;
use App\UI\Action\Interfaces\AllShopsActionInterface;
use App\UI\Responder\Interfaces\AllShopsResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AllShopsAction implements AllShopsActionInterface
{
    /**
     * @var ShopRepositoryInterface
     */
    private $shopRepo;

    /**
     * AllShopsAction constructor.
     *
     * @param ShopRepositoryInterface $shopRepo
     */
    public function __construct(ShopRepositoryInterface $shopRepo)
    {
        $this->shopRepo = $shopRepo;
    }

    /**
     * @Route(name="showAllShops", path="/admin/shop")
     * @param AllShopsResponderInterface $responder
     * @return Response
     */
    public function show(AllShopsResponderInterface $responder): Response
    {
        $shops = $this->shopRepo->getAll();

        return $responder->response($shops);
    }
}
