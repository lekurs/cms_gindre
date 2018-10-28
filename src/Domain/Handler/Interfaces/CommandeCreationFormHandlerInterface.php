<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 22/10/2018
 * Time: 18:35
 */

namespace App\Domain\Handler\Interfaces;


use App\Domain\Factory\Interfaces\CommandeFactoryInterface;
use App\Domain\Models\Shop;
use App\Domain\Repository\Interfaces\CommandeRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

interface CommandeCreationFormHandlerInterface
{
    public function __construct(
        CommandeFactoryInterface $orderFactory,
        CommandeRepositoryInterface $orderRepo,
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
