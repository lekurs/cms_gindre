<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 22/09/2018
 * Time: 14:59
 */

namespace App\Domain\Handler\Interfaces;


use App\Domain\Factory\StatutShopFactory;
use App\Domain\Repository\Interfaces\StatutShopRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

interface CreationStatusShopHandlerInterface
{
    /**
     * CreationStatusShopHandlerInterface constructor.
     *
     * @param StatutShopRepositoryInterface $statusShopRepo
     * @param StatutShopFactory $statusFactory
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(
        StatutShopRepositoryInterface $statusShopRepo,
        StatutShopFactory $statusFactory,
        SessionInterface $session,
        ValidatorInterface $validator
    );

    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form): bool;
}
