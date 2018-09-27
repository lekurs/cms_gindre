<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 25/09/2018
 * Time: 09:10
 */

namespace App\Domain\Handler;


use App\Domain\Factory\Interfaces\ContactFactoryInterface;
use App\Domain\Handler\Interfaces\CreationContactFormHandlerInterface;
use App\Domain\Repository\Interfaces\ContactRepositoryInterface;
use App\Services\Interfaces\SlugHelperInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CreationContactFormHandler implements CreationContactFormHandlerInterface
{
    /**
     * @var ContactFactoryInterface
     */
    private $contactFactory;

    /**
     * @var ContactRepositoryInterface
     */
    private $contactRepo;

    /**
     * @var SlugHelperInterface
     */
    private $slugHelper;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * CreationContactFormHandler constructor.
     *
     * @param ContactFactoryInterface $contactFactory
     * @param ContactRepositoryInterface $contactRepo
     * @param SlugHelperInterface $slugHelper
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(
        ContactFactoryInterface $contactFactory,
        ContactRepositoryInterface $contactRepo,
        SlugHelperInterface $slugHelper,
        SessionInterface $session,
        ValidatorInterface $validator
    ) {
        $this->contactFactory = $contactFactory;
        $this->contactRepo = $contactRepo;
        $this->slugHelper = $slugHelper;
        $this->session = $session;
        $this->validator = $validator;
    }

    /**
     * @param FormInterface $form
     * @param null $shop
     * @return bool
     */
    public function handle(FormInterface $form, $shop = null): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $this->contactFactory->create(
                $form->getData()->name,
                $form->getData()->lastName,
                $form->getData()->phoneOne,
                $form->getData()->phoneMobile,
                $form->getData()->email,
                $form->getData()->role,
                $form->getData()->main,
                $this->slugHelper->replace($form->getData()->name . '-' . $form->getData()->lastName),
                $shop
            );

//            $this->validator->validate([]);

            $this->contactRepo->save($contact);

            $this->session->getFlashBag("success", "Nouveau contact ajouté");

            return true;
        }

        return false;
    }


}