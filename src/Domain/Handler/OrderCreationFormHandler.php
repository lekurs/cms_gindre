<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 22/10/2018
 * Time: 18:35
 */

namespace App\Domain\Handler;


use App\Domain\Factory\Interfaces\OrderFactoryInterface;
use App\Domain\Handler\Interfaces\OrderCreationFormHandlerInterface;
use App\Domain\Models\Shop;
use App\Domain\Repository\Interfaces\OrderRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class OrderCreationFormHandler implements OrderCreationFormHandlerInterface
{
    /**
     * @var OrderFactoryInterface
     */
    private $orderFactory;

    /**
     * @var OrderRepositoryInterface
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
     * OrderCreationFormHandler constructor.
     * @param OrderFactoryInterface $orderFactory
     * @param OrderRepositoryInterface $orderRepo
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(OrderFactoryInterface $orderFactory, OrderRepositoryInterface $orderRepo, SessionInterface $session, ValidatorInterface $validator)
    {
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
                $form->getData()->amount
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