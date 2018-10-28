<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 22/09/2018
 * Time: 11:26
 */

namespace App\UI\Responder\Back;


use App\UI\Responder\Interfaces\RegionResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class RegionResponder implements RegionResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * RegionResponder constructor.
     *
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param array $regions
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function response(array $regions): Response
    {
        return new Response($this->twig->render('Back/show-map.html.twig', [
            'regions' => $regions,
        ]));
    }
}
