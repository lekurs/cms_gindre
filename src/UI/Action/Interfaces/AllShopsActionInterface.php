<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 22/09/2018
 * Time: 15:29
 */

namespace App\UI\Action\Interfaces;


use App\Domain\Repository\Interfaces\ShopRepositoryInterface;
use App\UI\Responder\Interfaces\AllShopsResponderInterface;
use Symfony\Component\HttpFoundation\Response;

interface AllShopsActionInterface
{
    /**
     * AllShopsActionInterface constructor.
     *
     * @param ShopRepositoryInterface $shopRepo
     */
    public function __construct(ShopRepositoryInterface $shopRepo);

    /**
     * @param AllShopsResponderInterface $responder
     * @return Response
     */
    public function show(AllShopsResponderInterface $responder): Response;
}
