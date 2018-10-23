<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 22/10/2018
 * Time: 21:59
 */

namespace App\UI\Action\Back;


use App\Domain\DTO\CommandeEditDTO;
use App\Domain\Form\CommandeCreationForm;
use App\Domain\Form\CommandeEditForm;
use App\Domain\Handler\Interfaces\CommandeCreationFormHandlerInterface;
use App\Domain\Models\Commande;
use App\Domain\Repository\Interfaces\CommandeRepositoryInterface;
use App\Domain\Repository\Interfaces\ShopRepositoryInterface;
use App\UI\Action\Interfaces\CommandeCreationActionInterface;
use App\UI\Responder\Interfaces\CommandeCreationResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommandeCreationAction implements CommandeCreationActionInterface
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
     * @var ShopRepositoryInterface
     */
    private $shopRepo;

    /**
     * @var CommandeCreationFormHandlerInterface
     */
    private $commandeCreationFormHandler;

    /**
     * CommandeCreationAction constructor.
     *
     * @param FormFactoryInterface $formFactory
     * @param CommandeRepositoryInterface $commandeRepo
     * @param CommandeCreationFormHandlerInterface $commandeCreationFormHandler
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        CommandeRepositoryInterface $commandeRepo,
        ShopRepositoryInterface $shopRepo,
        CommandeCreationFormHandlerInterface $commandeCreationFormHandler
    ) {
        $this->formFactory = $formFactory;
        $this->commandeRepo = $commandeRepo;
        $this->shopRepo = $shopRepo;
        $this->commandeCreationFormHandler = $commandeCreationFormHandler;
    }

    /**
     * @Route(name="commande", path="admin/shop/one/{slug}/commande")
     * @param Request $request
     * @param CommandeCreationResponderInterface $responder
     * @return Response
     */
    public function show(Request $request, CommandeCreationResponderInterface $responder): Response
    {
        $shop = $this->shopRepo->getWithCommandes($request->attributes->get('slug'));

        $total = $this->commandeRepo->totalAmountByShop($shop);

        $form = $this->formFactory->create(CommandeCreationForm::class)->handleRequest($request);

        if ($this->commandeCreationFormHandler->handle($form, $shop)) {

            return $responder->response(true, null, $shop->getCommandes()->toArray(), $shop, $total);
        }

        return $responder->response(false, $form, $shop->getCommandes()->toArray(), $shop, $total);
    }
}
