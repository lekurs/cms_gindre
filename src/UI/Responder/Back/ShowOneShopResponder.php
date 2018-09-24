<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 22/09/2018
 * Time: 15:21
 */

namespace App\UI\Responder\Back;


use App\UI\Responder\Interfaces\ShowShopResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class ShowOneShopResponder implements ShowShopResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * ShowOneShopResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param $shop
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function response($shop): Response
    {
        return new Response($this->twig->render('Back/show-one-shop.html.twig', [
            'shop' => $shop,
        ]));
    }

}