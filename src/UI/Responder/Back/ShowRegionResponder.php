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

class ShowRegionResponder
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * ShowRegionResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function response(): Response
    {
        return new Response($this->twig->render('Back/show-map.html.twig', [

        ]));
    }
}