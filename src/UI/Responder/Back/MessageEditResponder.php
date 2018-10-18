<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 18/10/2018
 * Time: 21:01
 */

namespace App\UI\Responder\Back;


use App\Domain\Models\Message;
use App\Domain\Models\Shop;
use App\UI\Responder\Interfaces\MessageEditResponderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

class MessageEditResponder implements MessageEditResponderInterface
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
     * MessageEditResponder constructor.
     * @param Environment $twig
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(Environment $twig, UrlGeneratorInterface $urlGenerator)
    {
        $this->twig = $twig;
        $this->urlGenerator = $urlGenerator;
    }

    public function response($redirect = false, FormInterface $form = null, Shop $shop = null, Message $message): Response
    {
        $redirect ?
            $response = new RedirectResponse($this->urlGenerator->generate('showOneShop',  ['slug' =>$shop->getSlug()] )) :
            $response = new Response($this->twig->render('Form/edit-message-form.html.twig', [
                'form' => $form->createView(),
//                'shop' => $shop
                'message' => $message,
            ]));

        return $response;
    }
}