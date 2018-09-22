<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 22/09/2018
 * Time: 15:29
 */

namespace App\UI\Action\Back;


use App\Domain\Repository\Interfaces\ShopRepositoryInterface;
use App\UI\Action\Interfaces\ShowAllShopsActionInterface;
use App\UI\Responder\Interfaces\ShowAllShopsResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowAllShopsAction implements ShowAllShopsActionInterface
{
    /**
     * @var ShopRepositoryInterface
     */
    private $shopRepo;

    /**
     * ShowAllShopsAction constructor.
     * @param ShopRepositoryInterface $shopRepo
     */
    public function __construct(ShopRepositoryInterface $shopRepo)
    {
        $this->shopRepo = $shopRepo;
    }

    /**
     * @Route(name="showAllShops", path="/admin/shop/all")
     * @param ShowAllShopsResponderInterface $responder
     * @return Response
     */
    public function show(ShowAllShopsResponderInterface $responder): Response
    {
        $shops = $this->shopRepo->getAll();

        dump($shops);

        return $responder->response($shops);
    }

}