<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 22/09/2018
 * Time: 15:23
 */

namespace App\UI\Action\Back;


use App\Domain\DTO\ContactCreationFormDTO;
use App\Domain\DTO\ContactEditFormDTO;
use App\Domain\Form\ContactCreationForm;
use App\Domain\Form\ContactEditForm;
use App\Domain\Form\CreationMessageForm;
use App\Domain\Handler\Interfaces\CreationContactFormHandlerInterface;
use App\Domain\Handler\Interfaces\CreationMessageFormHandlerInterface;
use App\Domain\Handler\Interfaces\EditContactFormHandlerInterface;
use App\Domain\Repository\Interfaces\ContactRepositoryInterface;
use App\Domain\Repository\Interfaces\ShopRepositoryInterface;
use App\UI\Action\Interfaces\ShowOneShopActionInterface;
use App\UI\Responder\Back\GetContactAjaxResponder;
use App\UI\Responder\Interfaces\EditContactResponderInterface;
use App\UI\Responder\Interfaces\ShowAllShopsResponderInterface;
use App\UI\Responder\Interfaces\ShowOneShopResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class ShowOneOneShopAction implements ShowOneShopActionInterface
{
    /**
     * @var ShopRepositoryInterface
     */
    private $shopRepo;

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
     * ShowOneOneShopAction constructor.
     *
     * @param ShopRepositoryInterface $shopRepo
     * @param ContactRepositoryInterface $contactRepo
     * @param FormFactoryInterface $formFactory
     * @param CreationMessageFormHandlerInterface $formMessageHandler
     * @param CreationContactFormHandlerInterface $formContactHandler
     * @param EditContactFormHandlerInterface $formEditContactHandler
     */
    public function __construct(
        ShopRepositoryInterface $shopRepo,
        ContactRepositoryInterface $contactRepo,
        FormFactoryInterface $formFactory,
        CreationMessageFormHandlerInterface $formMessageHandler,
        CreationContactFormHandlerInterface $formContactHandler,
        EditContactFormHandlerInterface $formEditContactHandler
    ) {
        $this->shopRepo = $shopRepo;
        $this->contactRepo = $contactRepo;
        $this->formFactory = $formFactory;
        $this->formMessageHandler = $formMessageHandler;
        $this->formContactHandler = $formContactHandler;
        $this->formEditContactHandler = $formEditContactHandler;
    }


    /**
     * @Route(name="showOneShop", path="admin/shop/one/{slug}")
     * @param Request $request
     * @param ShowOneShopResponderInterface $responder
     * @return Response
     */
    public function show(Request $request, ShowOneShopResponderInterface $responder): Response
    {
        $shop = $this->shopRepo->getOne($request->attributes->get('slug'));

        $form = $this->formFactory->create(CreationMessageForm::class)->handleRequest($request);

        $formContact = $this->formFactory->create(ContactCreationForm::class)->handleRequest($request);

        if ($this->formContactHandler->handle($formContact, $shop)) {

            return $responder->response(true, null, null, $shop, $shop->getSlug());
        }

        elseif ($this->formMessageHandler->handle($form, $shop)) {

            return $responder->response(true, null, null, $shop, $shop->getSlug());
        }

        return $responder->response(false, $form, $formContact, $shop);
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
     * @Route(name="deleteShop", path="/admin/shop/one/contact/delete", methods={"POST"})
     * @param Request $request
     * @param ShowAllShopsResponderInterface $responder
     * @return Response
     */
    public function deleteContact(Request $request, ShowAllShopsResponderInterface $responder): Response
    {
        $shop = $this->contactRepo->getOneBySlug($request->request->get('slug'));

        $shops = $this->shopRepo->getAll();

        $this->shopRepo->delete($shop);

        return $responder->response($shops);
    }
}
