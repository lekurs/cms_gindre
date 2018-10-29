<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 29/10/2018
 * Time: 16:52
 */

namespace App\Domain\Handler;


use App\Domain\Factory\Interfaces\ShopTypeFactoryInterface;
use App\Domain\Handler\Interfaces\ShopTypeCreationFormHandlerInterface;
use App\Domain\Repository\Interfaces\ShopTypeRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ShopTypeCreationFormHandler implements ShopTypeCreationFormHandlerInterface
{
    /**
     * @var ShopTypeFactoryInterface
     */
    private $shopTypeFactory;

    /**
     * @var ShopTypeRepositoryInterface
     */
    private $shopTypeRepo;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * ShopTypeCreationFormHandler constructor.
     *
     * @param ShopTypeFactoryInterface $shopTypeFactory
     * @param ShopTypeRepositoryInterface $shopTypeRepo
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(
        ShopTypeFactoryInterface $shopTypeFactory,
        ShopTypeRepositoryInterface $shopTypeRepo,
        SessionInterface $session,
        ValidatorInterface $validator
    ) {
        $this->shopTypeFactory = $shopTypeFactory;
        $this->shopTypeRepo = $shopTypeRepo;
        $this->session = $session;
        $this->validator = $validator;
    }

    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $shopType = $this->shopTypeFactory->create($form->getData()->shopType);

//            $this->validator->validate($shopType, [], ['shopType_creation']);

            $this->shopTypeRepo->save($shopType);

            $this->session->getFlashBag()->add('success', 'Le type de magasin à été créé');

            return true;
        }

        return false;
    }
}
