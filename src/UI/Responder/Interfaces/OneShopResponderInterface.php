<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 22/09/2018
 * Time: 15:21
 */

namespace App\UI\Responder\Interfaces;


use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

interface OneShopResponderInterface
{
    /**
     * OneShopResponderInterface constructor.
     *
     * @param Environment $twig
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(Environment $twig, UrlGeneratorInterface $urlGenerator);

    /**
     * @param bool $redirect
     * @param FormInterface|null $form
     * @param FormInterface|null $formContact
     * @param $shop
     * @param array $orders
     * @param $total
     * @param null $slug
     * @return Response
     */
    public function response($redirect = false, FormInterface $form = null, FormInterface $formContact = null, $shop, array $orders, $total, $slug = null): Response;
}