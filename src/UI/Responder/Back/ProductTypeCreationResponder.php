<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 12:03
 */

namespace App\UI\Responder\Back;


use App\UI\Responder\Interfaces\ProductTypeCreationResponderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

class ProductTypeCreationResponder implements ProductTypeCreationResponderInterface
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
     * ProductTypeCreationResponder constructor.
     *
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
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function response($redirect = false, FormInterface $form = null): Response
    {
        $redirect ?
            $response = new RedirectResponse($this->urlGenerator->generate('index')) :
            $response = new Response($this->twig->render('Back/creation-product-type.html.twig', [
            'form' => $form->createView()
        ]));

        return $response;
    }
}
