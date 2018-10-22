<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 22/10/2018
 * Time: 21:59
 */

namespace App\UI\Action\Back;


use App\Domain\Form\CommandeCreationForm;
use App\Domain\Handler\Interfaces\CommandeCreationFormHandlerInterface;
use App\Domain\Models\Shop;
use App\Domain\Repository\Interfaces\CommandeRepositoryInterface;
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
     * @var CommandeCreationFormHandlerInterface
     */
    private $commandeCreationFormHandler;

    /**
     * CommandeCreationAction constructor.
     * @param FormFactoryInterface $formFactory
     * @param CommandeRepositoryInterface $commandeRepo
     * @param CommandeCreationFormHandlerInterface $commandeCreationFormHandler
     */
    public function __construct(FormFactoryInterface $formFactory, CommandeRepositoryInterface $commandeRepo, CommandeCreationFormHandlerInterface $commandeCreationFormHandler)
    {
        $this->formFactory = $formFactory;
        $this->commandeRepo = $commandeRepo;
        $this->commandeCreationFormHandler = $commandeCreationFormHandler;
    }

    /**
     * @Route(name="commandeCreation", path="admin/shop/one/{slug}/commande/add")
     * @param Request $request
     * @param CommandeCreationResponderInterface $responder
     * @return Response
     */
    public function show(Request $request, CommandeCreationResponderInterface $responder): Response
    {
        $commandes = $this->commandeRepo->getAllBySlugShop($request->attributes->get('slug'));

        dump($commandes);

//        $shop = array_map(function (Shop $shop) { return $shop; }, $commandes->getShop());

        foreach ($commandes as $commande) {
            $shop = $commande->getShop();
        }

        $form = $this->formFactory->create(CommandeCreationForm::class)->handleRequest($request);

        if ($this->commandeCreationFormHandler->handle($form, $shop)) {

            return $responder->response(true, null, $commandes, $shop);
        }

        return $responder->response(false, $form, $commandes, $shop);
    }
}