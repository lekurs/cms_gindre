<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 27/10/2018
 * Time: 18:42
 */

namespace App\UI\Action\Interfaces;


use App\Domain\Repository\RegionRepository;
use App\UI\Responder\Interfaces\RegionResponderInterface;
use Symfony\Component\HttpFoundation\Response;

interface ShowMapActionInterface
{
    /**
     * ShowMapActionInterface constructor.
     *
     * @param RegionRepository $regionRepo
     */
    public function __construct(RegionRepository $regionRepo);

    /**
     * @param RegionResponderInterface $responder
     * @return Response
     */
    public function show(RegionResponderInterface $responder): Response;
}
