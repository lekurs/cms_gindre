<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 25/09/2018
 * Time: 12:42
 */

namespace App\UI\Responder\Back;


use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class GetContactAjaxResponder
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * GetContactAjaxResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function response(FormInterface $form = null): Response
    {
        return new Response($this->twig->render('Form/edit-contact.html.twig', [
            'form' => $form->createView()
        ]));
    }

}