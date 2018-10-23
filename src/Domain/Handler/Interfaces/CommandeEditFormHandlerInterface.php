<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 22/10/2018
 * Time: 23:17
 */

namespace App\Domain\Handler\Interfaces;


use App\Domain\Models\Commande;
use App\Domain\Repository\Interfaces\CommandeRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

interface CommandeEditFormHandlerInterface
{
    /**
     * CommandeEditFormHandlerInterface constructor.
     *
     * @param CommandeRepositoryInterface $commandeRepo
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(
        CommandeRepositoryInterface $commandeRepo,
        SessionInterface $session,
        ValidatorInterface $validator
    );

    /**
     * @param FormInterface $form
     * @param Commande $commande
     * @return bool
     */
    public function handle(FormInterface $form, Commande $commande): bool;
}
