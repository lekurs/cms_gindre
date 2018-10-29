<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 13:58
 */

namespace App\Domain\Handler\Interfaces;


use App\Domain\Factory\Interfaces\ContactFactoryInterface;
use App\Domain\Factory\Interfaces\ShopFactoryInterface;
use App\Domain\Repository\DepartementRepository;
use App\Domain\Repository\Interfaces\ShopRepositoryInterface;
use App\Services\Interfaces\SlugHelperInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

interface CreationShopFormHandlerInterface
{
    /**
     * CreationShopFormHandlerInterface constructor.
     *
     * @param DepartementRepository $departementRepo
     * @param ShopFactoryInterface $shopFactory
     * @param ContactFactoryInterface $contactFactory
     * @param ShopRepositoryInterface $shopRepo
     * @param SlugHelperInterface $slugHelper
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
//    public function __construct(
//        DepartementRepository $departementRepo,
//        ShopFactoryInterface $shopFactory,
//        ContactFactoryInterface $contactFactory,
//        ShopRepositoryInterface $shopRepo,
//        SlugHelperInterface $slugHelper,
//        SessionInterface $session,
//        ValidatorInterface $validator
//    );

    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form): bool;
}
