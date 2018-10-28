<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 28/10/2018
 * Time: 10:35
 */

namespace App\Domain\Handler\Interfaces;


use App\Domain\Models\Shop;
use App\Domain\Repository\Interfaces\DepartementRepositoryInterface;
use App\Domain\Repository\Interfaces\ShopRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

interface ShopEditFormHandlerInterface
{
    /**
     * ShopEditFormHandlerInterface constructor.
     *
     * @param ShopRepositoryInterface $shopRepo
     * @param DepartementRepositoryInterface $departementRepo
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(
        ShopRepositoryInterface $shopRepo,
        DepartementRepositoryInterface $departementRepo,
        SessionInterface $session,
        ValidatorInterface $validator
    );

    /**
     * @param FormInterface $form
     * @param Shop $shop
     * @return bool
     */
    public function handle(FormInterface $form, Shop $shop): bool;
}
