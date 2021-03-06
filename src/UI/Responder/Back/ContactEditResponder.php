<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 27/09/2018
 * Time: 17:24
 */

namespace App\UI\Responder\Back;


use App\Domain\Models\Shop;
use App\UI\Responder\Interfaces\EditContactResponderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

class ContactEditResponder implements EditContactResponderInterface
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
     * ContactEditResponder constructor.
     * @param Environment $twig
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(Environment $twig, UrlGeneratorInterface $urlGenerator)
    {
        $this->twig = $twig;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @param bool $redirect
     * @param FormInterface|null $form
     * @param Shop $shop
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function response($redirect = false, FormInterface $form = null, Shop $shop): Response
    {
        $redirect ?
            $response = new RedirectResponse($this->urlGenerator->generate('showOneShop', ['slug' =>$shop->getSlug()])) :
            $response = new Response($this->twig->render('Back/show-all-shops.html.twig', [
            'form' => $form->createView()
        ]));

        return $response;
    }
}
