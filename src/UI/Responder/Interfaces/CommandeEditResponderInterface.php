<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 22/10/2018
 * Time: 23:41
 */

namespace App\UI\Responder\Interfaces;


use App\Domain\Models\Commande;
use App\Domain\Models\Shop;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

interface CommandeEditResponderInterface
{
    /**
     * CommandeEditResponderInterface constructor.
     *
     * @param Environment $twig
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(Environment $twig, UrlGeneratorInterface $urlGenerator);

    /**
     * @param bool $redirect
     * @param FormInterface|null $form
     * @param Shop $shop
     * @param Commande $commande
     * @return Response
     */
    public function response($redirect = false, FormInterface $form = null, Shop $shop, Commande $commande): Response;
}
