<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 22/10/2018
 * Time: 21:55
 */

namespace App\UI\Responder\Interfaces;


use App\Domain\Models\Shop;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

interface CommandeCreationResponderInterface
{
    /**
     * CommandeCreationResponderInterface constructor.
     *
     * @param Environment $twig
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(Environment $twig, UrlGeneratorInterface $urlGenerator);

    /**
     * @param bool $redirect
     * @param FormInterface|null $form
     * @param array $commandes
     * @param Shop $shop
     * @return Response
     */
    public function response($redirect = false, FormInterface $form = null, array $commandes, Shop $shop): Response;
}
