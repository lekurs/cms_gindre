<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 15/10/2018
 * Time: 21:32
 */

namespace App\UI\Action\Back;


use App\Domain\Models\Commande;
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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
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
    private $regionRepo; //delete

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
     *
     * @param ShopRepositoryInterface $shopRepo
     * @param MessageRepositoryInterface $messageRepo
     * @param RegionRepositoryInterface $regionRepo
     * @param DepartementRepositoryInterface $departementRepo
     * @param CommandeRepositoryInterface $commandeRepo
     */
    public function __construct(
        ShopRepositoryInterface $shopRepo,
        MessageRepositoryInterface $messageRepo,
        RegionRepositoryInterface $regionRepo,
        DepartementRepositoryInterface $departementRepo,
        CommandeRepositoryInterface $commandeRepo
    ) {
        $this->shopRepo = $shopRepo;
        $this->messageRepo = $messageRepo;
        $this->regionRepo = $regionRepo;
        $this->departementRepo = $departementRepo;
        $this->commandeRepo = $commandeRepo;
    }


    /**
     * @Route(name="admin", path="admin")
     *
     * @Security("is_granted('ROLE_ADMIN')")
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

        $shopsByDepartements = array_map(function (array $shop) { return $shop;}, $this->shopRepo->getAllByDepartement());
        $shopNoMessages = array_map(function (Shop $shop) { return $shop;}, $messages);
        $shopNoCommandes = array_map(function (Shop $shop) { return $shop;}, $commandes);
        $caByDepartement = array_map(function (array $commande) { return $commande; },$this->commandeRepo->totalByDepartement());
        
        return $responder->response($caByDepartement, $shopsByDepartements, $shopNoMessages, $shopNoCommandes);
    }
}
