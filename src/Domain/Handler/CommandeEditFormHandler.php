<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 22/10/2018
 * Time: 23:17
 */

namespace App\Domain\Handler;


use App\Domain\Handler\Interfaces\CommandeEditFormHandlerInterface;
use App\Domain\Models\Commande;
use App\Domain\Repository\Interfaces\CommandeRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CommandeEditFormHandler implements CommandeEditFormHandlerInterface
{
    /**
     * @var CommandeRepositoryInterface
     */
    private $commandeRepo;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * CommandeEditFormHandler constructor.
     *
     * @param CommandeRepositoryInterface $commandeRepo
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(
        CommandeRepositoryInterface $commandeRepo,
        SessionInterface $session,
        ValidatorInterface $validator
    ) {
        $this->commandeRepo = $commandeRepo;
        $this->session = $session;
        $this->validator = $validator;
    }

    /**
     * @param FormInterface $form
     * @param Commande $commande
     * @return bool
     */
    public function handle(FormInterface $form, Commande $commande): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {
            $commande->editCommande($form->getData());

            $this->commandeRepo->edit();

            $this->session->getFlashBag()->add('success', 'Commande mise à jour');

            return true;
        }

        return false;
    }
}
