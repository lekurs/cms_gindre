<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 2019-03-12
 * Time: 12:09
 */

namespace App\UI\Responder\Emailing;


use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class UploadFileToSendResponder
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * UploadFileToSendResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }


    public function response(): Response
    {
        return new Response();
    }
}