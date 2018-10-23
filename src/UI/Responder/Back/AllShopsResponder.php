<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 22/09/2018
 * Time: 15:26
 */

namespace App\UI\Responder\Back;


use App\Domain\Models\Shop;
use App\UI\Responder\Interfaces\AllShopsResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class AllShopsResponder implements AllShopsResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * AllShopsResponder constructor.
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