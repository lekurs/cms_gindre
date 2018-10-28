<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 11:17
 */

namespace App\Domain\Handler;


use App\Domain\Factory\Interfaces\ContactTypeFactoryInterface;
use App\Domain\Handler\Interfaces\CreationContactTypeFormHandlerInterface;
use App\Domain\Repository\ContactTypeRepository;
use App\Domain\Repository\Interfaces\ContactTypeRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CreationContactTypeFormHandler implements CreationContactTypeFormHandlerInterface
{
    /**
     * @var ContactTypeFactoryInterface
     */
    private $contactTypeFactory;
    /**
     * @var ContactTypeRepositoryInterface
     */
    private $contactTypeRepo;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * CreationContactTypeFormHandler constructor.
     *
     * @param ContactTypeFactoryInterface $contactTypeFactory
     * @param ContactTypeRepositoryInterface $contactTypeRepo
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(
        ContactTypeFactoryInterface $contactTypeFactory,
        ContactTypeRepositoryInterface $contactTypeRepo,
        SessionInterface $session,
        ValidatorInterface $validator
    ) {
        $this->contactTypeFactory = $contactTypeFactory;
        $this->contactTypeRepo = $contactTypeRepo;
        $this->session = $session;
        $this->validator = $validator;
    }

    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form): bool {

        if ($form->isSubmitted() && $form->isValid()) {
            $contactType = $this->contactTypeFactory->create($form->getData()->type);

            $this->session->getFlashBag()->add("success", "Type de contact client ajouté");

//            $this->validator->validate([]);

            $this->contactTypeRepo->save($contactType);

            return true;
        }
        return false;
    }
}
