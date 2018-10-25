<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 22/10/2018
 * Time: 21:55
 */

namespace App\UI\Responder\Back;


use App\Domain\Models\Shop;
use App\UI\Responder\Interfaces\CommandeCreationResponderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

class CommandeCreationResponder implements CommandeCreationResponderInterface
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
     * CommandeCreationResponder constructor.
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
     * @param array $commandes
     * @param Shop $shop
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function response($redirect = false, FormInterface $form = null, array $commandes, Shop $shop): Response
    {
        $redirect ? $response = new RedirectResponse($this->urlGenerator->generate('showOneShop', ['slug' => $shop->getSlug()])) : $response = new Response($this->twig->render('Back/commande-creation.html.twig', [
            'commandes' => $commandes,
            'form' => $form->createView(),
        ]));

        return $response;
    }
}
