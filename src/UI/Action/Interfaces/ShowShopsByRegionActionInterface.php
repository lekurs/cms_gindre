<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 24/09/2018
 * Time: 09:36
 */

namespace App\UI\Action\Interfaces;


use App\Domain\Repository\Interfaces\RegionRepositoryInterface;
use App\Domain\Repository\Interfaces\ShopRepositoryInterface;
use App\UI\Responder\Interfaces\ShowOneShopsByRegionResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface ShowShopsByRegionActionInterface
{
    /**
     * ShowShopsByRegionActionInterface constructor.
     *
     * @param RegionRepositoryInterface $regionRepo
     * @param ShopRepositoryInterface $shopRepo
     */
    public function __construct(RegionRepositoryInterface $regionRepo, ShopRepositoryInterface $shopRepo);

    /**
     * @param Request $request
     * @param ShowOneShopsByRegionResponderInterface $responder
     * @return Response
     */
    public function show(Request $request, ShowOneShopsByRegionResponderInterface $responder): Response;
}