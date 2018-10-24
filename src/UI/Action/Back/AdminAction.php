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
use App\Domain\Repository\Interfaces\CommandeRepositoryInterface;
use App\Domain\Repository\Interfaces\DepartementRepositoryInterface;
use App\Domain\Repository\Interfaces\MessageRepositoryInterface;
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
     * @var MessageRepositoryInterface
     */
    private $messageRepo;

    /**
     * @var RegionRepositoryInterface
     */
    private $regionRepo;

    /**
     * @var DepartementRepositoryInterface
     */
    private $departementRepo;

    /**
     * @var CommandeRepositoryInterface
     */
    private $commandeRepo;

    /**
     * AdminAction constructor.
     * @param ShopRepositoryInterface $shopRepo
     * @param MessageRepositoryInterface $messageRepo
     * @param RegionRepositoryInterface $regionRepo
     * @param DepartementRepositoryInterface $departementRepo
     * @param CommandeRepositoryInterface $commandeRepo
     */
    public function __construct(ShopRepositoryInterface $shopRepo, MessageRepositoryInterface $messageRepo, RegionRepositoryInterface $regionRepo, DepartementRepositoryInterface $departementRepo, CommandeRepositoryInterface $commandeRepo)
    {
        $this->shopRepo = $shopRepo;
        $this->messageRepo = $messageRepo;
        $this->regionRepo = $regionRepo;
        $this->departementRepo = $departementRepo;
        $this->commandeRepo = $commandeRepo;
    }


    /**
     * @Route(name="admin", path="admin")
     * @param AdminResponderInterface $responder
     * @return Response
     * @throws \Exception
     */
    public function adminIndex(AdminResponderInterface $responder): Response
    {
        $date = new \DateTime();
        $date2 = new \DateTime();

        $dateRelance = $date->sub(new \DateInterval('P30D'));
        $dateNotCommande = $date2->sub(new \DateInterval('P90D'));

        $messages = $this->shopRepo->getAllNotRecontacted($dateRelance);

        $commandes = $this->shopRepo->getNoCommande($dateNotCommande);

        $shops = array_map(function (Shop $shop) { return $shop;}, $this->shopRepo->getClients());
        $shopNoMessages = array_map(function (Shop $shop) { return $shop;}, $messages);
        $shopNoCommandes = array_map(function (Shop $shop) { return $shop;}, $commandes);
        $regions = array_map(function (Region $region) { return $region; }, $this->regionRepo->getAll());

        $dpt = array_map(function (Departement $dpt) { return $dpt; }, $this->departementRepo->getAllWithShop());

        $test = $this->shopRepo->getClients();

        $comm = $this->commandeRepo->totalByDepartement();

        dump($comm);
        $amount = [];
        foreach ($shops as $shop) {
            $idRegion = $shop->getRegion()->getId();
            foreach($shop->getCommandes()->toArray() as $commande) {
                if (isset($amount[$idRegion])) {
                    $amount[$idRegion] += $commande->getAmount();
                } else {
                    $amount[$idRegion] = $commande->getAmount();
                }
            }
        }
        dd($amount);

//        dump($test);
//
//        foreach ($test as $region) {
//            dump($region->getRegion());
//        }

        $data = [
            ['92' => '32560']
        ];

//        foreach ($dpt as $dep) {
//            dump($dep);
//            foreach ($dep->getRegion()->getShops() as $region) {
////                dump($region);
//            }
//        }

//        foreach ($shops as $shop) {
//            $data[$shop->getRegion()->getRegion()][]= $shop;
//        }

        return $responder->response($comm, $regions, $shopNoMessages, $shopNoCommandes);
    }
}
