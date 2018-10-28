<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 28/10/2018
 * Time: 15:09
 */

namespace App\UI\Responder\Interfaces;


use App\Domain\Models\Shop;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

interface ContactDeleteResponderInterface
{
    /**
     * ContactDeleteResponderInterface constructor.
     *
     * @param Environment $twig
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(Environment $twig, UrlGeneratorInterface $urlGenerator);

    /**
     * @param Shop $shop
     * @return RedirectResponse
     */
    public function response(Shop $shop): RedirectResponse;
}
