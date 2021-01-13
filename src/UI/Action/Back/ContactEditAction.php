<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 27/10/2018
 * Time: 18:23
 */

namespace App\UI\Action\Back;


use App\Domain\DTO\ContactEditFormDTO;
use App\Domain\Form\ContactEditForm;
use App\Domain\Handler\Interfaces\EditContactFormHandlerInterface;
use App\Domain\Repository\Interfaces\ContactRepositoryInterface;
use App\UI\Action\Interfaces\ContactEditActionInterface;
use App\UI\Responder\Interfaces\EditContactResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactEditAction implements ContactEditActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var ContactRepositoryInterface
     */
    private $contactRepo;

    /**
     * @var EditContactFormHandlerInterface
     */
    private $contactEditHandlerForm;

    /**
     * ContactEditAction constructor.
     *
     * @param FormFactoryInterface $formFactory
     * @param ContactRepositoryInterface $contactRepo
     * @param EditContactFormHandlerInterface $contactEditHandlerForm
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        ContactRepositoryInterface $contactRepo,
        EditContactFormHandlerInterface $contactEditHandlerForm
    ) {
        $this->formFactory = $formFactory;
        $this->contactRepo = $contactRepo;
        $this->contactEditHandlerForm = $contactEditHandlerForm;
    }

    /**
     * @Route(name="editContact", path="admin/shop/contact/edit")
     *
     * @IsGranted("ROLE_ADMIN")
     *
     * @param Request $request
     * @param EditContactResponderInterface $responder
     * @return mixed
     */
    public function editContact(Request $request, EditContactResponderInterface $responder): Response
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

        if ($this->contactEditHandlerForm->handle($form, $contact)) {

            return $responder->response(true, null, $shop);
        }

        return $responder->response(false, $form, $shop);
    }
}
