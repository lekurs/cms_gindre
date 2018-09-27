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
use App\Domain\Form\CreationMessageForm;
use App\Domain\Handler\Interfaces\CreationContactFormHandlerInterface;
use App\Domain\Handler\Interfaces\CreationMessageFormHandlerInterface;
use App\Domain\Repository\Interfaces\ContactRepositoryInterface;
use App\Domain\Repository\Interfaces\ShopRepositoryInterface;
use App\UI\Action\Interfaces\ShowOneShopActionInterface;
use App\UI\Responder\Back\GetContactAjaxResponder;
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
     * @var SessionInterface
     */
    private $session;

    /**
     * ShowOneOneShopAction constructor.
     *
     * @param ShopRepositoryInterface $shopRepo
     * @param FormFactoryInterface $formFactory
     * @param CreationMessageFormHandlerInterface $formMessageHandler
     * @param CreationContactFormHandlerInterface $formContactHandler
     */
    public function __construct(
        ShopRepositoryInterface $shopRepo,
        ContactRepositoryInterface $contactRepo,
        FormFactoryInterface $formFactory,
        CreationMessageFormHandlerInterface $formMessageHandler,
        CreationContactFormHandlerInterface $formContactHandler,
        SessionInterface $session
    ) {
        $this->shopRepo = $shopRepo;
        $this->contactRepo = $contactRepo;
        $this->formFactory = $formFactory;
        $this->formMessageHandler = $formMessageHandler;
        $this->formContactHandler = $formContactHandler;
        $this->session = $session;
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

//        $editContact = $this->formFactory->create(ContactCreationForm::class)->handleRequest($request);

        if ($this->formContactHandler->handle($formContact, $shop)) {

            return $responder->response(true, null, null, $shop, $shop->getSlug());
        }

        else if ($this->formMessageHandler->handle($form, $shop)) {

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
        $contact = $this->contactRepo->getOne($request->query->get('id'));

        $editContact = new ContactCreationFormDTO(
            $contact->getName(),
            $contact->getLastName(),
            $contact->getPhoneOne(),
            $contact->getPhoneMobile(),
            $contact->getEmail(),
            $contact->getRole(),
            $contact->isMain(),
            $contact->getShop()
        );

        $form = $this->formFactory->create(ContactCreationForm::class, $editContact);

        return $responder->response($form);
    }

    /**
     * @Route(name="editContact", path="admin/contact/edit")
     * @param Request $request
     */
    public function editContact(Request $request)
    {
        dump($request);
        die;
    }
}
