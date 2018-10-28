<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 27/10/2018
 * Time: 18:31
 */

namespace App\UI\Action\Interfaces;


use App\Domain\Repository\Interfaces\ContactRepositoryInterface;
use App\UI\Responder\Interfaces\ContactDeleteResponderInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

interface ContactDeleteActionInterface
{
    /**
     * ContactDeleteActionInterface constructor.
     *
     * @param ContactRepositoryInterface $contactRepo
     * @param SessionInterface $session
     */
    public function __construct(ContactRepositoryInterface $contactRepo, SessionInterface $session);

    /**
     * @param Request $request
     * @param ContactDeleteResponderInterface $responder
     * @return RedirectResponse
     */
    public function deleteContact(Request $request, ContactDeleteResponderInterface $responder): RedirectResponse;
}
