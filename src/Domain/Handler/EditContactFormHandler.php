<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 27/09/2018
 * Time: 17:00
 */

namespace App\Domain\Handler;


use App\Domain\Handler\Interfaces\EditContactFormHandlerInterface;
use App\Domain\Repository\ContactRepository;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class EditContactFormHandler implements EditContactFormHandlerInterface
{
    /**
     * @var ContactRepository
     */
    private $contactRepo;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * EditContactFormHandler constructor.
     *
     * @param ContactRepository $contactRepo
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(
        ContactRepository $contactRepo,
        SessionInterface $session,
        ValidatorInterface $validator
    ) {
        $this->contactRepo = $contactRepo;
        $this->session = $session;
        $this->validator = $validator;
    }

    /**
     * @param FormInterface $form
     * @param $contact
     * @return bool
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function handle(FormInterface $form, $contact): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $contact->updateContact($form->getData());

            $this->contactRepo->update();

            return true;
        }
        return false;
    }
}
