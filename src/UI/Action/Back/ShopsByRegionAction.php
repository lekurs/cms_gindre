<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 24/09/2018
 * Time: 09:36
 */

namespace App\UI\Action\Back;


use App\Domain\Repository\Interfaces\RegionRepositoryInterface;
use App\Domain\Repository\Interfaces\ShopRepositoryInterface;
use App\UI\Action\Interfaces\ShopsByRegionActionInterface;
use App\UI\Responder\Interfaces\ShopByRegionResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShopsByRegionAction implements ShopsByRegionActionInterface
{
    /**
     * @var RegionRepositoryInterface
     */
    private $regionRepo;

    /**
     * @var ShopRepositoryInterface
     */
    private $shopRepo;

    /**
     * ShopsByRegionAction constructor.
     * @param RegionRepositoryInterface $regionRepo
     * @param ShopRepositoryInterface $shopRepo
     */
    public function __construct(RegionRepositoryInterface $regionRepo, ShopRepositoryInterface $shopRepo)
    {
        $this->regionRepo = $regionRepo;
        $this->shopRepo = $shopRepo;
    }

    /**
     * @Route(name="showShopByRegion", path="/admin/shop/{region}")
     *
     * @IsGranted("ROLE_ADMIN")
     *
     * @param Request $request
     * @param ShopByRegionResponderInterface $responder
     * @return Response
     */
    public function show(Request $request, ShopByRegionResponderInterface $responder): Response
    {
        $shops = $this->shopRepo->getAllByRegion($request->attributes->get('region'));

        return $responder->response($shops);
    }
}
