<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 16:17
 */

namespace App\UI\Responder\Back;


use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class TestRegionResponder
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * TestRegionResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function response(FormInterface $form = null): Response
    {
        return new Response($this->twig->render('Back/test-region.html.twig', [
            'form' => $form->createView(),
        ]));
    }
}
