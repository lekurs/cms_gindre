<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 11:54
 */

namespace App\Domain\Handler\Interfaces;


use App\Domain\Factory\Interfaces\ProductTypeFactoryInterface;
use App\Domain\Repository\Interfaces\ProductTypeRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

interface CreationProductTypeFormHandlerInterface
{
    /**
     * CreationProductTypeFormHandlerInterface constructor.
     *
     * @param ProductTypeFactoryInterface $productTypeFactory
     * @param ProductTypeRepositoryInterface $productTypeRepo
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(
        ProductTypeFactoryInterface $productTypeFactory,
        ProductTypeRepositoryInterface $productTypeRepo,
        SessionInterface $session,
        ValidatorInterface $validator
    );

    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form): bool;
}
