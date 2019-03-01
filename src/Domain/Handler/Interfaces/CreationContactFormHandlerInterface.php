<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 25/09/2018
 * Time: 09:11
 */

namespace App\Domain\Handler\Interfaces;


use App\Domain\Factory\Interfaces\ContactFactoryInterface;
use App\Domain\Repository\Interfaces\ContactRepositoryInterface;
use App\Services\Interfaces\SlugHelperInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

interface CreationContactFormHandlerInterface
{
    /**
     * CreationContactFormHandlerInterface constructor.
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
    );

    /**
     * @param FormInterface $form
     * @param null $shop
     * @return bool
     */
    public function handle(FormInterface $form, $shop = null): bool;
}
