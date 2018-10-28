<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 18/10/2018
 * Time: 21:01
 */

namespace App\UI\Responder\Interfaces;


use App\Domain\Models\Message;
use App\Domain\Models\Shop;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

interface MessageEditResponderInterface
{
    /**
     * MessageEditResponderInterface constructor.
     *
     * @param Environment $twig
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(Environment $twig, UrlGeneratorInterface $urlGenerator);

    /**
     * @param bool $redirect
     * @param FormInterface|null $form
     * @param Shop|null $shop
     * @param Message $message
     * @return Response
     */
    public function response($redirect = false, FormInterface $form = null, Shop $shop = null, Message $message): Response;
}
