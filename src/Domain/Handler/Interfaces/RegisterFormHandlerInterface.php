<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 23/10/2018
 * Time: 15:18
 */

namespace App\Domain\Handler\Interfaces;


use App\Domain\Factory\Interfaces\UserFactoryInterface;
use App\Domain\Repository\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\SlugHelperInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

interface RegisterFormHandlerInterface
{
    /**
     * RegisterFormHandlerInterface constructor.
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
    ) ;

    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form): bool;
}
