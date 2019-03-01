<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 24/09/2018
 * Time: 17:59
 */

namespace App\Domain\Handler\Interfaces;


use App\Domain\Factory\Interfaces\MessageFactoryInterface;
use App\Domain\Models\Shop;
use App\Domain\Repository\Interfaces\MessageRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

interface CreationMessageFormHandlerInterface
{
    public function __construct(
        MessageFactoryInterface $messageFactory,
        MessageRepositoryInterface $messageRepo,
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