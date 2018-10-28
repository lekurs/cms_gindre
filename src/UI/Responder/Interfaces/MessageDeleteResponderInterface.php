<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 28/10/2018
 * Time: 12:06
 */

namespace App\UI\Responder\Interfaces;


use Symfony\Component\HttpFoundation\JsonResponse;

interface MessageDeleteResponderInterface
{
    /**
     * @return JsonResponse
     */
    public function response(): JsonResponse;
}
