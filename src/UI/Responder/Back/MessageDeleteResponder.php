<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 28/10/2018
 * Time: 12:06
 */

namespace App\UI\Responder\Back;


use App\UI\Responder\Interfaces\MessageDeleteResponderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class MessageDeleteResponder implements MessageDeleteResponderInterface
{
    /**
     * @return JsonResponse
     */
    public function response(): JsonResponse
    {
        return new JsonResponse('success', 200);
    }
}
