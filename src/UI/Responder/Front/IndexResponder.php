<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 11:35
 */

namespace App\UI\Responder\Front;


use App\UI\Responder\Interfaces\IndexResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class IndexResponder implements IndexResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * IndexResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function response(): Response
    {
        return new Response($this->twig->render('layout.html.twig', [

        ]));
    }
}
