<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 2019-02-28
 * Time: 23:15
 */

namespace App\UI\Responder\Back;


use App\UI\Responder\Interfaces\SearchByContactResponderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

class SearchByContactResponder implements SearchByContactResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * SearchByContactResponder constructor.
     * @param Environment $twig
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(Environment $twig, UrlGeneratorInterface $urlGenerator)
    {
        $this->twig = $twig;
        $this->urlGenerator = $urlGenerator;
    }

    public function response($redirect = false, FormInterface $form = null, array $shop = null): Response
    {
        $redirect ?
            $response = new Response($this->twig->render('Back/show-shop-by-contact.html.twig', [
                'shop' => $shop,
            ])) :
            $response = new Response($this->twig->render('Back/search-by-contact.html.twig', [
                'form' => $form->createView()
            ]));

        return $response;
    }
}