<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 24/09/2018
 * Time: 09:30
 */

namespace App\UI\Responder\Interfaces;


use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

interface ShowOneShopsByRegionResponderInterface
{
    /**
     * ShowOneShopsByRegionResponderInterface constructor.
     *
     * @param Environment $twig
     */
    public function __construct(Environment $twig);

    /**
     * @param array $shops
     * @return Response
     */
    public function response(array $shops): Response;
}