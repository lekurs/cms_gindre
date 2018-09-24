<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 24/09/2018
 * Time: 16:31
 */

namespace App\UI\Action\Back;


use App\Domain\Repository\Interfaces\ShopRepositoryInterface;
use App\UI\Responder\Back\ChartsShowAllCountryResponder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ChartsShowAllCountryAction
{
    /**
     * @var ShopRepositoryInterface
     */
    private $shopRepo;

    /**
     * ChartsShowAllCountryAction constructor.
     * @param ShopRepositoryInterface $shopRepo
     */
    public function __construct(ShopRepositoryInterface $shopRepo)
    {
        $this->shopRepo = $shopRepo;
    }

    /**
     * @Route(name="chartsAllCounrty", path="map/charts/all")
     * @param Request $request
     * @param ChartsShowAllCountryResponder $responder
     * @return JsonResponse
     */
    public function showData(Request $request, ChartsShowAllCountryResponder $responder): JsonResponse
    {
        $shops = $this->shopRepo->getAll();

//        foreach ($shops as $shop) {
//            $data[
//                'cols' => [
//                    'id' => $shop->getId(),
//                'name' => $shop->getName()
//                ]
//            ] = $shop;
//        dump($data);
//        }

        dump($shops);

        return $responder->response($shops);
    }

}