<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 28/10/2018
 * Time: 10:53
 */

namespace App\UI\Responder\Interfaces;


use App\Domain\Models\Shop;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

interface ShopEditResponderInterface
{
    /**
     * ShopEditResponderInterface constructor.
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
