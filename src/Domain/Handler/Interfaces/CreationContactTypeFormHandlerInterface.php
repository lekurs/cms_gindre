<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 11:17
 */

namespace App\Domain\Handler\Interfaces;


use App\Domain\Factory\Interfaces\ContactTypeFactoryInterface;
use App\Domain\Repository\Interfaces\ContactTypeRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

interface CreationContactTypeFormHandlerInterface
{
    /**
     * CreationContactTypeFormHandlerInterface constructor.
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
    );

    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form): bool ;
}
