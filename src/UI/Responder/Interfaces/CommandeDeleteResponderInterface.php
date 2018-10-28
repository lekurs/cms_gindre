<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 28/10/2018
 * Time: 14:25
 */

namespace App\UI\Responder\Interfaces;


use App\Domain\Models\Shop;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

interface CommandeDeleteResponderInterface
{
    /**
     * CommandeDeleteResponderInterface constructor.
     *
     * @param Environment $twig
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(Environment $twig, UrlGeneratorInterface $urlGenerator);

    /**
     * @param Shop $shop
     * @return Response
     */
    public function response(Shop $shop):RedirectResponse;
}

