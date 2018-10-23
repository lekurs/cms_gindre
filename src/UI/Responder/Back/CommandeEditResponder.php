<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 22/10/2018
 * Time: 23:41
 */

namespace App\UI\Responder\Back;


use App\Domain\Models\Commande;
use App\Domain\Models\Shop;
use App\UI\Responder\Interfaces\CommandeEditResponderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

class CommandeEditResponder implements CommandeEditResponderInterface
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
     * CommandeEditResponder constructor.
     *
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
     * @param Commande $commande
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function response($redirect = false, FormInterface $form = null, Shop $shop, Commande $commande): Response
    {
        $redirect ? $response = new RedirectResponse($this->urlGenerator->generate('showOneShop',  ['slug' => $shop->getSlug()])) : $response = new Response($this->twig->render('Back/commande-edit-form.html.twig', [
            'form' => $form->createView(),
            'shop' => $shop,
            'commande' => $commande
        ]));

        return $response;
    }
}
