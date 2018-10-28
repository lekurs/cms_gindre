<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 15/10/2018
 * Time: 21:32
 */

namespace App\UI\Responder\Back;


use App\UI\Responder\Interfaces\AdminResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class AdminResponder implements AdminResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * AdminResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param array $caByDepartements
     * @param array $shopsByDepartements
     * @param array $shopNoMessages
     * @param array $shopNoCommandes
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function response(array $caByDepartements, array $shopsByDepartements, array $shopNoMessages, array $shopNoCommandes): Response
    {
        return new Response($this->twig->render('Back/admin.html.twig', [
            'caByDepartements' => $caByDepartements,
            'shopsByDepartements' => $shopsByDepartements,
            'shopNoMessages' => $shopNoMessages,
            'shopNoCommandes' => $shopNoCommandes
        ]));
    }
}
