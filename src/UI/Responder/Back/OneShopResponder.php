<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 22/09/2018
 * Time: 15:21
 */

namespace App\UI\Responder\Back;


use App\UI\Responder\Interfaces\OneShopResponderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

class OneShopResponder implements OneShopResponderInterface
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
     * OneShopResponder constructor.
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
     * @param $shop
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function response($redirect = false, FormInterface $form = null, FormInterface $formContact = null, FormInterface $formOrder = null, $shop, $slug = null, array $orders): Response
    {
        $redirect ? $response = new RedirectResponse($this->urlGenerator->generate('showOneShop', ['slug' => $slug])) : $response =  new Response($this->twig->render('Back/show-one-shop.html.twig', [
            'form' => $form->createView(),
            'formContact' => $formContact->createView(),
            'formOrder' => $formOrder->createView(),
            'shop' => $shop,
            'orders' => $orders
        ]));

        return $response;
    }

}