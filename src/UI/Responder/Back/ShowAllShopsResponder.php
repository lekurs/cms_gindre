<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 22/09/2018
 * Time: 15:26
 */

namespace App\UI\Responder\Back;


use App\UI\Responder\Interfaces\ShowAllShopsResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class ShowAllShopsResponder implements ShowAllShopsResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * ShowAllShopsResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function response(array $shops): Response
    {
        return new Response($this->twig->render('Back/show-all-shops.html.twig', [
            'shops' => $shops,
        ]));
    }

}