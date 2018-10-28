<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 28/10/2018
 * Time: 15:09
 */

namespace App\UI\Responder;


use App\Domain\Models\Shop;
use App\UI\Responder\Interfaces\ContactDeleteResponderInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

class ContactDeleteResponder implements ContactDeleteResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * ContactDeleteResponder constructor.
     *
     * @param Environment $twig
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(Environment $twig, UrlGeneratorInterface $urlGenerator)
    {
        $this->twig = $twig;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @param Shop $shop
     * @return RedirectResponse
     */
    public function response(Shop $shop): RedirectResponse
    {
        return new RedirectResponse($this->urlGenerator->generate('showOneShop', ['slug' => $shop->getSlug()]));
    }
}
