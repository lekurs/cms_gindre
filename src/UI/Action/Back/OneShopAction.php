<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 22/09/2018
 * Time: 15:23
 */

namespace App\UI\Action\Back;


use App\Domain\DTO\ContactEditFormDTO;
use App\Domain\Form\ContactCreationForm;
use App\Domain\Form\ContactEditForm;
use App\Domain\Form\MessageCreationForm;
use App\Domain\Form\CommandeCreationForm;
use App\Domain\Handler\Interfaces\CreationContactFormHandlerInterface;
use App\Domain\Handler\Interfaces\CreationMessageFormHandlerInterface;
use App\Domain\Handler\Interfaces\EditContactFormHandlerInterface;
use App\Domain\Handler\Interfaces\CommandeCreationFormHandlerInterface;
use App\Domain\Repository\Interfaces\ContactRepositoryInterface;
use App\Domain\Repository\Interfaces\CommandeRepositoryInterface;
use App\Domain\Repository\Interfaces\ShopRepositoryInterface;
use App\UI\Action\Interfaces\OneShopActionInterface;
use App\UI\Responder\Back\GetContactAjaxResponder;
use App\UI\Responder\Interfaces\EditContactResponderInterface;
use App\UI\Responder\Interfaces\AllShopsResponderInterface;
use App\UI\Responder\Interfaces\OneShopResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OneShopAction implements OneShopActionInterface
{
    /**
     * @var ShopRepositoryInterface
     */
    private $shopRepo;

    /**
     * @var CommandeRepositoryInterface
     */
    private $orderRepo;

    /**
     * @var ContactRepositoryInterface
     */
    private $contactRepo;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var CreationMessageFormHandlerInterface
     */
    private $formMessageHandler;

    /**
     * @var CreationContactFormHandlerInterface
     */
    private $formContactHandler;

    /**
     * @var EditContactFormHandlerInterface
     */
    private $formEditContactHandler;

    /**
     * @var CommandeCreationFormHandlerInterface
     */
    private $commandeCreationFormHandler;

    /**
     * OneShopAction constructor.
     *
     * @param ShopRepositoryInterface $shopRepo
     * @param CommandeRepositoryInterface $orderRepo
     * @param ContactRepositoryInterface $contactRepo
     * @param FormFactoryInterface $formFactory
     * @param CreationMessageFormHandlerInterface $formMessageHandler
     * @param CreationContactFormHandlerInterface $formContactHandler
     * @param EditContactFormHandlerInterface $formEditContactHandler
     * @param CommandeCreationFormHandlerInterface $commandeCreationFormHandler
     */
    public function __construct(
        ShopRepositoryInterface $shopRepo,
        CommandeRepositoryInterface $orderRepo,
        ContactRepositoryInterface $contactRepo,
        FormFactoryInterface $formFactory,
        CreationMessageFormHandlerInterface $formMessageHandler,
        CreationContactFormHandlerInterface $formContactHandler,
        EditContactFormHandlerInterface $formEditContactHandler,
        CommandeCreationFormHandlerInterface $commandeCreationFormHandler
    ) {
        $this->shopRepo = $shopRepo;
        $this->orderRepo = $orderRepo;
        $this->contactRepo = $contactRepo;
        $this->formFactory = $formFactory;
        $this->formMessageHandler = $formMessageHandler;
        $this->formContactHandler = $formContactHandler;
        $this->formEditContactHandler = $formEditContactHandler;
        $this->commandeCreationFormHandler = $commandeCreationFormHandler;
    }


    /**
     * @Route(name="showOneShop", path="admin/shop/one/{slug}")
     * @param Request $request
     * @param OneShopResponderInterface $responder
     * @return Response
     */
    public function show(Request $request, OneShopResponderInterface $responder): Response
    {
        $shop = $this->shopRepo->getOne($request->attributes->get('slug'));

        $orders = $this->orderRepo->getLimitByShop($shop);

        $form = $this->formFactory->create(MessageCreationForm::class)->handleRequest($request);

        $formContact = $this->formFactory->create(ContactCreationForm::class)->handleRequest($request);

        if ($this->formContactHandler->handle($formContact, $shop)) {

            return $responder->response(true, null, null, $shop, $orders, $shop->getSlug());
        }

        elseif ($this->formMessageHandler->handle($form, $shop)) {

            return $responder->response(true, null, null, $shop, $orders, $shop->getSlug());
        }

        return $responder->response(false, $form, $formContact, $shop, $orders);
    }

    /**
     * @Route(name="getContactFormAjax", path="admin/shop/one/shop/getcontact")
     * @param Request $request
     * @param GetContactAjaxResponder $responder
     * @return Response
     */
    public function getContactForm(Request $request, GetContactAjaxResponder $responder)
    {
        if (!$request->isXmlHttpRequest()) {
            return new \Exception("No Ajax !");
        }

        $contact = $this->contactRepo->getOne($request->query->get('id'));

        $editContact = new ContactEditFormDTO(
            $contact->getId(),
            $contact->getName(),
            $contact->getLastName(),
            $contact->getPhoneOne(),
            $contact->getPhoneMobile(),
            $contact->getEmail(),
            $contact->getRole(),
            $contact->isMain(),
            $contact->getSlug()

        );

        $form = $this->formFactory->create(ContactEditForm::class, $editContact);

        return $responder->response($form);
    }

    /**
     * @Route(name="editContact", path="admin/shop/contact/edit")
     * @param Request $request
     * @param EditContactResponderInterface $responder
     * @return mixed
     */
    public function editContact(Request $request, EditContactResponderInterface $responder)
    {
        $contact = $this->contactRepo->getOne($request->request->get('contact_edit_form')['id']);

        $editContact = new ContactEditFormDTO(
            $contact->getId(),
            $contact->getName(),
            $contact->getLastName(),
            $contact->getPhoneOne(),
            $contact->getPhoneMobile(),
            $contact->getEmail(),
            $contact->getRole(),
            $contact->isMain(),
            $contact->getSlug()
        );

        $shop = $contact->getShop();

        $form = $this->formFactory->create(ContactEditForm::class, $editContact)->handleRequest($request);

        if ($this->formEditContactHandler->handle($form, $contact)) {

            return $responder->response(true, null, $shop);
        }

        return $responder->response(false, $form, $shop);
    }

    /**
     * @Route(name="deleteContact", path="/admin/shop/one/contact/delete", methods={"POST"})
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
