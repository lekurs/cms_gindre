<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 27/09/2018
 * Time: 17:01
 */

namespace App\Domain\Handler\Interfaces;


use App\Domain\Repository\ContactRepository;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

interface EditContactFormHandlerInterface
{
    /**
     * EditContactFormHandlerInterface constructor.
     *
     * @param ContactRepository $contactRepo
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(
        ContactRepository $contactRepo,
        SessionInterface $session,
        ValidatorInterface $validator
    );

    /**
     * @param FormInterface $form
     * @param $contact
     * @return bool
     */
    public function handle(FormInterface $form, $contact): bool;
}
