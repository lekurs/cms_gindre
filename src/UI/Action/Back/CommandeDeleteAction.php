<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 28/10/2018
 * Time: 14:27
 */

namespace App\UI\Action\Back;


use App\Domain\Repository\Interfaces\CommandeRepositoryInterface;
use App\UI\Action\Interfaces\CommandeDeleteActionInterface;
use App\UI\Responder\Interfaces\CommandeDeleteResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CommandeDeleteAction implements CommandeDeleteActionInterface
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
     * CommandeDeleteAction constructor.
     *
     * @param CommandeRepositoryInterface $commandeRepo
     * @param SessionInterface $session
     */
    public function __construct(CommandeRepositoryInterface $commandeRepo, SessionInterface $session)
    {
        $this->commandeRepo = $commandeRepo;
        $this->session = $session;
    }


    /**
     * @Route(name="deleteCommande", path="admin/shop/one/{slug}/commande/del/{id}")
     *
     * @IsGranted("ROLE_ADMIN")
     *
     * @param Request $request
     * @param CommandeDeleteResponderInterface $responder
     * @return Response
     */
    public function delete(Request $request, CommandeDeleteResponderInterface $responder): Response
    {
        $commande = $this->commandeRepo->getOne($request->attributes->get('id'));

        $this->commandeRepo->delete($commande);

        $this->session->getFlashBag()->add('success', 'Commande supprimée');

        return $responder->response($commande->getShop());
    }
}
