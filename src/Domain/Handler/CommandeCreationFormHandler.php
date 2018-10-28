<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 22/10/2018
 * Time: 18:35
 */

namespace App\Domain\Handler;


use App\Domain\Factory\Interfaces\CommandeFactoryInterface;
use App\Domain\Handler\Interfaces\CommandeCreationFormHandlerInterface;
use App\Domain\Models\Shop;
use App\Domain\Repository\Interfaces\CommandeRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CommandeCreationFormHandler implements CommandeCreationFormHandlerInterface
{
    /**
     * @var CommandeFactoryInterface
     */
    private $orderFactory;

    /**
     * @var CommandeRepositoryInterface
     */
    private $orderRepo;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * CommandeCreationFormHandler constructor.
     *
     * @param CommandeFactoryInterface $orderFactory
     * @param CommandeRepositoryInterface $orderRepo
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(
        CommandeFactoryInterface $orderFactory,
        CommandeRepositoryInterface $orderRepo,
        SessionInterface $session,
        ValidatorInterface $validator
    ) {
        $this->orderFactory = $orderFactory;
        $this->orderRepo = $orderRepo;
        $this->session = $session;
        $this->validator = $validator;
    }

    public function handle(FormInterface $form, Shop $shop): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $order = $this->orderFactory->create(
                $shop,
                $form->getData()->productType,
                $form->getData()->dateOrder,
                $form->getData()->amount,
                $form->getData()->number
            );

//            $this->validator->validate($order, [], [
//                'order_creation'
//            ]);

            $this->orderRepo->save($order);

            $this->session->getFlashBag()->add('success', 'Commande ajoutée');

            return true;
        }

        return false;
    }
}
