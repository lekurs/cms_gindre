<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 27/10/2018
 * Time: 18:31
 */

namespace App\UI\Action\Back;


use App\Domain\Repository\Interfaces\ContactRepositoryInterface;
use App\UI\Action\Interfaces\ContactDeleteActionInterface;
use App\UI\Responder\Interfaces\AllShopsResponderInterface;
use App\UI\Responder\Interfaces\ContactDeleteResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class ContactDeleteAction implements ContactDeleteActionInterface
{

    /**
     * @var ContactRepositoryInterface
     */
    private $contactRepo;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * ContactDeleteAction constructor.
     * @param ContactRepositoryInterface $contactRepo
     * @param SessionInterface $session
     */
    public function __construct(ContactRepositoryInterface $contactRepo, SessionInterface $session)
    {
        $this->contactRepo = $contactRepo;
        $this->session = $session;
    }


    /**
     * @Route(name="deleteContact", path="/admin/shop/one/{slug}/contact/delete/{slugContact}")
     *
     * @Security("is_granted('ROLE_ADMIN')")
     *
     * @param Request $request
     * @param ContactDeleteResponderInterface $responder
     * @return RedirectResponse
     */
    public function deleteContact(Request $request, ContactDeleteResponderInterface $responder): RedirectResponse
    {
        $contact = $this->contactRepo->getOneBySlug($request->attributes->get('slugContact'));

        $this->contactRepo->delete($contact);

        $this->session->getFlashBag()->add('success', 'Contact supprimé');

        return $responder->response($contact->getShop());
    }
}
