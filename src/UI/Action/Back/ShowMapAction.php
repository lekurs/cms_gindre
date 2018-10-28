<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 22/09/2018
 * Time: 11:26
 */

namespace App\UI\Action\Back;


use App\Domain\Repository\RegionRepository;
use App\UI\Action\Interfaces\ShowMapActionInterface;
use App\UI\Responder\Back\RegionResponder;
use App\UI\Responder\Interfaces\RegionResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowMapAction implements ShowMapActionInterface
{
    /**
     * @var RegionRepository
     */
    private $regionRepo;

    /**
     * ShowMapAction constructor.
     * @param RegionRepository $regionRepo
     */
    public function __construct(RegionRepository $regionRepo)
    {
        $this->regionRepo = $regionRepo;
    }


    /**
     * @Route(name="showMap", path="admin/map")
     *
     * @Security("is_granted('ROLE_ADMIN')")
     *
     * @param RegionResponderInterface $responder
     * @return Response
     */
    public function show(RegionResponderInterface $responder): Response
    {
        $regions = $this->regionRepo->getAll();

        foreach ($regions as $region) {
            $mesregions[$region->getId()] = $region;
        }

        return $responder->response($mesregions);
    }
}
