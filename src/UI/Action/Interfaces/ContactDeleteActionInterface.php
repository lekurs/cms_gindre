<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 27/10/2018
 * Time: 18:31
 */

namespace App\UI\Action\Interfaces;


use App\Domain\Repository\Interfaces\ContactRepositoryInterface;
use App\UI\Responder\Interfaces\AllShopsResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface ContactDeleteActionInterface
{
    /**
     * ContactDeleteActionInterface constructor.
     *
     * @param ContactRepositoryInterface $contactRepo
     */
    public function __construct(ContactRepositoryInterface $contactRepo);

    /**
     * @param Request $request
     * @param AllShopsResponderInterface $responder
     * @return Response
     */
    public function deleteContact(Request $request, AllShopsResponderInterface $responder): Response;
}
