<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 27/09/2018
 * Time: 17:25
 */

namespace App\UI\Responder\Interfaces;


use App\Domain\Models\Shop;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

interface EditContactResponderInterface
{
    /**
     * EditContactResponderInterface constructor.
     *
     * @param Environment $twig
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(Environment $twig, UrlGeneratorInterface $urlGenerator);

    /**
     * @param bool $redirect
     * @param FormInterface|null $form
     * @param Shop $shop
     * @return Response
     */
    public function response($redirect = false, FormInterface $form = null, Shop $shop): Response;
}