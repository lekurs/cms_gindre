<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 15/10/2018
 * Time: 21:33
 */

namespace App\UI\Responder\Interfaces;


use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

interface AdminResponderInterface
{
    /**
     * AdminResponderInterface constructor.
     *
     * @param Environment $twig
     */
    public function __construct(Environment $twig);

    /**
     * @param array $caByDepartements
     * @param array $shopsByDepartements
     * @param array $shopNoMessages
     * @param array $shopNoCommandes
     * @return Response
     */
    public function response(array $caByDepartements, array $shopsByDepartements, array $shopNoMessages, array $shopNoCommandes): Response;
}
