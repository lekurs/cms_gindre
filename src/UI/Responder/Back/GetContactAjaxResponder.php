<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 25/09/2018
 * Time: 12:42
 */

namespace App\UI\Responder\Back;


use App\UI\Responder\Interfaces\GetContactAjaxResponderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class GetContactAjaxResponder implements GetContactAjaxResponderInterface
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

    /**
     * @param FormInterface|null $form
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function response(FormInterface $form = null): Response
    {
        return new Response($this->twig->render('Form/edit-contact.html.twig', [
            'form' => $form->createView()
        ]));
    }
}
