<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 22/09/2018
 * Time: 11:26
 */

namespace App\UI\Action\Back;


use App\Domain\Repository\RegionRepository;
use App\UI\Responder\Back\RegionResponder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegionAction
{
    /**
     * @var RegionRepository
     */
    private $regionRepo;

    /**
     * RegionAction constructor.
     * @param RegionRepository $regionRepo
     */
    public function __construct(RegionRepository $regionRepo)
    {
        $this->regionRepo = $regionRepo;
    }


    /**
     * @Route(name="showMap", path="admin/map")
     * @param RegionResponder $responder
     * @return Response
     */
    public function show(RegionResponder $responder): Response
    {
        $regions = $this->regionRepo->getAll();

        dump(count($regions[11]->getShops()));

        foreach ($regions as $region) {
            $mesregions[$region->getId()] = $region;
        }

        return $responder->response($mesregions);
    }
}