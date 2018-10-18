<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 22/09/2018
 * Time: 11:26
 */

namespace App\UI\Responder\Back;


use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class RegionResponder
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * RegionResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function response(array $regions): Response
    {
        return new Response($this->twig->render('Back/show-map.html.twig', [
            'regions' => $regions,
        ]));
    }
}