<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 12:34
 */

namespace App\Domain\Handler\Interfaces;


use App\Domain\Factory\Interfaces\RoleFactoryInterface;
use App\Domain\Repository\Interfaces\RoleRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

interface CreationRoleFormHandlerInterface
{
    /**
     * CreationRoleFormHandlerInterface constructor.
     *
     * @param RoleFactoryInterface $roleFactory
     * @param RoleRepositoryInterface $roleRepo
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(
        RoleFactoryInterface $roleFactory,
        RoleRepositoryInterface $roleRepo,
        SessionInterface $session,
        ValidatorInterface $validator
    );

    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form): bool;
}
