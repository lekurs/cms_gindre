<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 15/10/2018
 * Time: 21:32
 */

namespace App\UI\Action\Back;


use App\Domain\Models\Departement;
use App\Domain\Models\Region;
use App\Domain\Models\Shop;
use App\Domain\Repository\DepartementRepository;
use App\Domain\Repository\Interfaces\DepartementRepositoryInterface;
use App\Domain\Repository\Interfaces\RegionRepositoryInterface;
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
     * @var RegionRepositoryInterface
     */
    private $regionRepo;

    /**
     * @var DepartementRepositoryInterface
     */
    private $departementRepo;

    /**
     * AdminAction constructor.
     * @param ShopRepositoryInterface $shopRepo
     * @param RegionRepositoryInterface $regionRepo
     * @param DepartementRepositoryInterface $departementRepo
     */
    public function __construct(ShopRepositoryInterface $shopRepo, RegionRepositoryInterface $regionRepo, DepartementRepositoryInterface $departementRepo)
    {
        $this->shopRepo = $shopRepo;
        $this->regionRepo = $regionRepo;
        $this->departementRepo = $departementRepo;
    }


    /**
     * @Route(name="admin", path="admin")
     * @param AdminResponderInterface $responder
     * @return Response
     */
    public function adminIndex(AdminResponderInterface $responder): Response
    {
        $shops = array_map(function (Shop $shop) { return $shop;}, $this->shopRepo->getClients());

        $regions = array_map(function (Region $region) { return $region; }, $this->regionRepo->getAll());

        $dpt = array_map(function (Departement $dpt) { return $dpt; }, $this->departementRepo->getAllWithShop());

        foreach ($shops as $shop) {
            $data[$shop->getRegion()->getRegion()][]= $shop;
        }

//        dump($data, $shops, $dpt);

        return $responder->response($shops, $regions);
    }
}
