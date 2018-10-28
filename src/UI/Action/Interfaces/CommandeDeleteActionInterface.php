<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 28/10/2018
 * Time: 14:27
 */

namespace App\UI\Action\Interfaces;


use App\Domain\Repository\Interfaces\CommandeRepositoryInterface;
use App\UI\Responder\Interfaces\CommandeDeleteResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

interface CommandeDeleteActionInterface
{
    /**
     * CommandeDeleteActionInterface constructor.
     *
     * @param CommandeRepositoryInterface $commandeRepo
     * @param SessionInterface $session
     */
    public function __construct(CommandeRepositoryInterface $commandeRepo, SessionInterface $session);

    /**
     * @param Request $request
     * @param CommandeDeleteResponderInterface $responder
     * @return Response
     */
    public function delete(Request $request, CommandeDeleteResponderInterface $responder): Response;
}
