<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 22/09/2018
 * Time: 11:26
 */

namespace App\UI\Action\Back;


use App\UI\Responder\Back\ShowRegionResponder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowRegionAction
{
    /**
     * @Route(name="showMap", path="admin/map")
     * @param ShowRegionResponder $responder
     * @return Response
     */
    public function show(ShowRegionResponder $responder): Response
    {
        return $responder->response();
    }
}