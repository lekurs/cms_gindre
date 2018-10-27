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
use App\Domain\Handler\Interfaces\CreationContactFormHandlerInterface;
use App\Domain\Handler\Interfaces\CreationMessageFormHandlerInterface;
use App\Domain\Repository\Interfaces\ContactRepositoryInterface;
use App\Domain\Repository\Interfaces\CommandeRepositoryInterface;
use App\Domain\Repository\Interfaces\ShopRepositoryInterface;
use App\UI\Action\Interfaces\OneShopActionInterface;
use App\UI\Responder\Back\GetContactAjaxResponder;
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
     * @var CommandeRepositoryInterface
     */
    private $commandeRepo;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var CreationMessageFormHandlerInterface
     */
    private $creationMessageFormHandler;

    /**
     * @var CreationContactFormHandlerInterface
     */
    private $creationContactFormHandler;

    /**
     * OneShopAction constructor.
     *
     * @param ShopRepositoryInterface $shopRepo
     * @param ContactRepositoryInterface $contactRepo
     * @param CommandeRepositoryInterface $commandeRepo
     * @param FormFactoryInterface $formFactory
     * @param CreationMessageFormHandlerInterface $creationMessageFormHandler
     * @param CreationContactFormHandlerInterface $formContactHandler
     */
    public function __construct(
        ShopRepositoryInterface $shopRepo,
        ContactRepositoryInterface $contactRepo,
        CommandeRepositoryInterface $commandeRepo,
        FormFactoryInterface $formFactory,
        CreationMessageFormHandlerInterface $creationMessageFormHandler,
        CreationContactFormHandlerInterface $formContactHandler
    ) {
        $this->shopRepo = $shopRepo;
        $this->contactRepo = $contactRepo;
        $this->commandeRepo = $commandeRepo;
        $this->formFactory = $formFactory;
        $this->creationMessageFormHandler = $creationMessageFormHandler;
        $this->creationContactFormHandler = $formContactHandler;
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

        $orders = $this->commandeRepo->getLimitByShop($shop);

        $form = $this->formFactory->create(MessageCreationForm::class)->handleRequest($request);

        $formContact = $this->formFactory->create(ContactCreationForm::class)->handleRequest($request);

        $total = $this->commandeRepo->totalAmountByShop($shop);

        if ($this->creationContactFormHandler->handle($formContact, $shop)) {

            return $responder->response(true, null, null, $shop, $orders, $shop->getSlug());
        }

        elseif ($this->creationMessageFormHandler->handle($form, $shop)) {

            return $responder->response(true, null, null, $shop, $orders, $shop->getSlug());
        }

        return $responder->response(false, $form, $formContact, $shop, $orders, $total);
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
}
