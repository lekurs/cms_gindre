<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 22/10/2018
 * Time: 23:39
 */

namespace App\UI\Action\Back;


use App\Domain\DTO\CommandeEditDTO;
use App\Domain\Form\CommandeEditForm;
use App\Domain\Handler\Interfaces\CommandeEditFormHandlerInterface;
use App\Domain\Repository\Interfaces\CommandeRepositoryInterface;
use App\UI\Action\Interfaces\CommandeEditActionInterface;
use App\UI\Responder\Interfaces\CommandeEditResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommandeEditAction implements CommandeEditActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var CommandeRepositoryInterface
     */
    private $commandeRepo;

    /**
     * @var CommandeEditFormHandlerInterface
     */
    private $commandeEditFormHandler;

    /**
     * CommandeEditAction constructor.
     *
     * @param FormFactoryInterface $formFactory
     * @param CommandeRepositoryInterface $commandeRepo
     * @param CommandeEditFormHandlerInterface $commandeEditFormHandler
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        CommandeRepositoryInterface $commandeRepo,
        CommandeEditFormHandlerInterface $commandeEditFormHandler
    ) {
        $this->formFactory = $formFactory;
        $this->commandeRepo = $commandeRepo;
        $this->commandeEditFormHandler = $commandeEditFormHandler;
    }

    /**
     * @Route(name="editCommande", path="admin/shop/one/{slug}/commande/edit/{id}")
     *
     * @Security("is_granted('ROLE_ADMIN')")
     *
     * @param Request $request
     * @param CommandeEditResponderInterface $responder
     * @return Response
     */
    public function edit(Request $request, CommandeEditResponderInterface $responder): Response
    {
        dump($request->attributes->get('id'));
        $commande = $this->commandeRepo->getOne($request->attributes->get('id'));

        $commandeEdit = new CommandeEditDTO(
            $commande->getAmount(),
            $commande->getProductType(),
            $commande->getNumber()
        );

        $formEdit = $this->formFactory->create(CommandeEditForm::class, $commandeEdit)->handleRequest($request);

        if ($this->commandeEditFormHandler->handle($formEdit, $commande)) {

            return $responder->response(true, null, $commande->getShop(), $commande);
        }

        return $responder->response(false, $formEdit, $commande->getShop(), $commande);
    }
}
