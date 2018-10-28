<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 12:34
 */

namespace App\Domain\Handler;


use App\Domain\Factory\Interfaces\RoleFactoryInterface;
use App\Domain\Handler\Interfaces\CreationRoleFormHandlerInterface;
use App\Domain\Repository\Interfaces\RoleRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CreationRoleFormHandler implements CreationRoleFormHandlerInterface
{
    /**
     * @var RoleFactoryInterface
     */
    private $roleFactory;

    /**
     * @var RoleRepositoryInterface
     */
    private $roleRepo;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * CreationRoleFormHandler constructor.
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
    ) {
        $this->roleFactory = $roleFactory;
        $this->roleRepo = $roleRepo;
        $this->session = $session;
        $this->validator = $validator;
    }

    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {
            $role = $this->roleFactory->create($form->getData()->role);

//            $this->validator->validate([]);

            $this->roleRepo->save($role);

            $this->session->getFlashBag()->add("success", "La fonction du contact à été ajouté");

            return true;
        }

        return false;
    }
}
