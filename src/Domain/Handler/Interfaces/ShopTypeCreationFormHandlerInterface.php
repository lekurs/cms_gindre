<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 29/10/2018
 * Time: 16:52
 */

namespace App\Domain\Handler\Interfaces;


use App\Domain\Factory\Interfaces\ShopTypeFactoryInterface;
use App\Domain\Repository\Interfaces\ShopTypeRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

interface ShopTypeCreationFormHandlerInterface
{
    /**
     * ShopTypeCreationFormHandlerInterface constructor.
     *
     * @param ShopTypeFactoryInterface $shopTypeFactory
     * @param ShopTypeRepositoryInterface $shopTypeRepo
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(
        ShopTypeFactoryInterface $shopTypeFactory,
        ShopTypeRepositoryInterface $shopTypeRepo,
        SessionInterface $session,
        ValidatorInterface $validator
    );

    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form): bool;
}
