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
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactDeleteAction implements ContactDeleteActionInterface
{

    /**
     * @var ContactRepositoryInterface
     */
    private $contactRepo;

    /**
     * ContactDeleteAction constructor.
     * @param ContactRepositoryInterface $contactRepo
     */
    public function __construct(ContactRepositoryInterface $contactRepo)
    {
        $this->contactRepo = $contactRepo;
    }

    /**
     * @Route(name="deleteContact", path="/admin/shop/one/contact/delete", methods={"POST"})
     *
     * @param Request $request
     * @param AllShopsResponderInterface $responder
     * @return Response
     */
    public function deleteContact(Request $request, AllShopsResponderInterface $responder): Response
    {
//        $shop = $this->contactRepo->getOneBySlug($request->request->get('slug'));
//
//        $shops = $this->shopRepo->getAll();
//
//        $contact = $this->contactRepo->getOneBySlug($request->request->get('slug'));
//
////        $this->contactRepo->delete($contact);
//
//        return $responder->response($shops);
    }
}