<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 23/10/2018
 * Time: 14:59
 */

namespace App\UI\Responder\Security;


use App\UI\Responder\Interfaces\AdministratorResponderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

class AdministratorResponder implements AdministratorResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * AdministratorResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param FormInterface $form
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function response(FormInterface $form): Response
    {
        return new Response($this->twig->render('Security/administrator.html.twig', [
            'form' => $form->createView(),
        ]));
    }
}