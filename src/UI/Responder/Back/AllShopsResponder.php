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
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
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

    /**
     * @param array $shops
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function response(array $shops): Response
    {
            return new Response($this->twig->render('Back/show-all-shops.html.twig', [
            'shops' => $shops,
        ]));
    }
}
