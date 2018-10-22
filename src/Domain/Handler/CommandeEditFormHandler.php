<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 22/10/2018
 * Time: 23:17
 */

namespace App\Domain\Handler;


use App\Domain\DTO\CommandeEditDTO;
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
     * @param CommandeRepositoryInterface $commandeRepo
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(CommandeRepositoryInterface $commandeRepo, SessionInterface $session, ValidatorInterface $validator)
    {
        $this->commandeRepo = $commandeRepo;
        $this->session = $session;
        $this->validator = $validator;
    }

    public function handle(FormInterface $form, Commande $commande): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {


            return true;
        }

        return false;
    }
}