<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 22/09/2018
 * Time: 14:59
 */

namespace App\Domain\Handler;


use App\Domain\Factory\StatutShopFactory;
use App\Domain\Handler\Interfaces\CreationStatusShopHandlerInterface;
use App\Domain\Repository\Interfaces\StatutShopRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CreationStatusShopHandler implements CreationStatusShopHandlerInterface
{
    /**
     * @var StatutShopRepositoryInterface
     */
    private $statusShopRepo;

    /**
     * @var StatutShopFactory
     */
    private $statusFactory;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * CreationStatusShopHandler constructor.
     * @param StatutShopRepositoryInterface $statusShopRepo
     * @param StatutShopFactory $statusFactory
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(StatutShopRepositoryInterface $statusShopRepo, StatutShopFactory $statusFactory, SessionInterface $session, ValidatorInterface $validator)
    {
        $this->statusShopRepo = $statusShopRepo;
        $this->statusFactory = $statusFactory;
        $this->session = $session;
        $this->validator = $validator;
    }

    /**
     * @param $form
     * @return bool
     */
    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {
            $statusShop = $this->statusFactory->create($form->getData()->status);

//            $this->validator->validate([], []);

            $this->statusShopRepo->save($statusShop);

            return true;
        }

        return false;
    }
}