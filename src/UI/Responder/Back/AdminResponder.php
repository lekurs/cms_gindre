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

    public function response(array $shops): Response
    {
        return new Response($this->twig->render('Back/admin.html.twig', [
            'shops' => $shops,
        ]));
    }
}
