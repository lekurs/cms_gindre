<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 24/09/2018
 * Time: 09:30
 */

namespace App\UI\Responder\Back;


use App\UI\Responder\Interfaces\ShopByRegionResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class ShopByRegionResponder implements ShopByRegionResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * ShopByRegionResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function response(array $shops): Response
    {
        return new Response($this->twig->render('Back/show-shops-by-region.html.twig', [
            'shops' => $shops
        ]));
    }
}
