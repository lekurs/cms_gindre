<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 23/10/2018
 * Time: 15:18
 */

namespace App\Domain\Handler;


use App\Domain\Factory\Interfaces\UserFactoryInterface;
use App\Domain\Handler\Interfaces\RegisterFormHandlerInterface;
use App\Domain\Repository\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\SlugHelperInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class RegisterFormHandler implements RegisterFormHandlerInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepo;

    /**
     * @var UserFactoryInterface
     */
    private $userFactory;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * @var SlugHelperInterface
     */
    private $slugHeper;

    /**
     * RegisterFormHandler constructor.
     *
     * @param UserRepositoryInterface $userRepo
     * @param UserFactoryInterface $userFactory
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     * @param SlugHelperInterface $slugHeper
     */
    public function __construct(
        UserRepositoryInterface $userRepo,
        UserFactoryInterface $userFactory,
        SessionInterface $session,
        ValidatorInterface $validator,
        SlugHelperInterface $slugHeper
    ) {
        $this->userRepo = $userRepo;
        $this->userFactory = $userFactory;
        $this->session = $session;
        $this->validator = $validator;
        $this->slugHeper = $slugHeper;
    }

    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->userFactory->create(
                $form->getData()->username,
                $form->getData()->password,
                $form->getData()->email,
                "ROLE_ADMIN",
                $this->slugHeper->replace($form->getData()->username)
            );

            $this->userRepo->save($user);

            return true;
        }

        return false;
    }

}