<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 28/10/2018
 * Time: 13:42
 */

namespace App\UI\Responder\Interfaces;


use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

interface GetContactAjaxResponderInterface
{
    /**
     * GetContactAjaxResponderInterface constructor.
     *
     * @param Environment $twig
     */
    public function __construct(Environment $twig);

    /**
     * @param FormInterface|null $form
     * @return Response
     */
    public function response(FormInterface $form = null): Response;
}
