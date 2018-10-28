<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 11:34
 */

namespace App\UI\Action\Front;


use App\UI\Action\Interfaces\IndexActionInterface;
use App\UI\Responder\Interfaces\IndexResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexAction implements IndexActionInterface
{
    /**
     * @Route(name="index", path="/index")
     * @param IndexResponderInterface $responder
     * @return Response
     */
    public function show(IndexResponderInterface $responder): Response
    {
        return $responder->response();
    }
}
