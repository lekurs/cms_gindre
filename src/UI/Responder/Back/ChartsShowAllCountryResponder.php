<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 24/09/2018
 * Time: 16:31
 */

namespace App\UI\Responder\Back;


use Symfony\Component\HttpFoundation\JsonResponse;

class ChartsShowAllCountryResponder
{
    public function response(array $data): JsonResponse
    {
        return new JsonResponse(
//            {
//                "cols" : [
//                                    {"id": "", "label": "Prospect", "type": "string"},
//        ]
        [$data], 200);
    }

}