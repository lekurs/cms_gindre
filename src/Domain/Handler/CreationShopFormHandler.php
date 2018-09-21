<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 13:56
 */

namespace App\Domain\Handler;


use App\Domain\Factory\Interfaces\ContactFactoryInterface;
use App\Domain\Factory\Interfaces\ShopFactoryInterface;
use App\Domain\Handler\Interfaces\CreationShopFormHandlerInterface;
use App\Domain\Repository\Interfaces\ShopRepositoryInterface;
use App\Services\Interfaces\SlugHelperInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CreationShopFormHandler implements CreationShopFormHandlerInterface
{
    /**
     * @var ShopFactoryInterface
     */
    private $shopFactory;

    /**
     * @var ContactFactoryInterface
     */
    private $contactFactory;

    /**
     * @var ShopRepositoryInterface
     */
    private $shopRepo;

    /**
     * @var SlugHelperInterface
     */
    private $slugHelper;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * CreationShopFormHandler constructor.
     * @param ShopFactoryInterface $shopFactory
     * @param ContactFactoryInterface $contactFactory
     * @param ShopRepositoryInterface $shopRepo
     * @param SlugHelperInterface $slugHelper
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(ShopFactoryInterface $shopFactory, ContactFactoryInterface $contactFactory, ShopRepositoryInterface $shopRepo, SlugHelperInterface $slugHelper, SessionInterface $session, ValidatorInterface $validator)
    {
        $this->shopFactory = $shopFactory;
        $this->contactFactory = $contactFactory;
        $this->shopRepo = $shopRepo;
        $this->slugHelper = $slugHelper;
        $this->session = $session;
        $this->validator = $validator;
    }


    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            if (count($form->getData()->contact > 0)) {
                $contacts = [];
                foreach ($form->getData()->contact as $contact) {
                    $contacts[] = $this->contactFactory->create(
                        $contact->name,
                        $contact->lastName,
                        $contact->phoneOne,
                        $contact->phoneMobile,
                        $contact->email,
                        $contact->role,
                        $contact->main,
                        $this->slugHelper->replace($contact->name . '-' . $contact->lastName)
                    );
                }
            }

            $shop = $this->shopFactory->create(
                $form->getData()->name,
                $form->getData()->address,
                $form->getData()->zip,
                $form->getData()->city,
                $contacts ?? [],
                $form->getData()->region,
                $form->getData()->number,
                $this->slugHelper->replace($form->getData()->name)
            );

//            $this->validator->validate([]);

            $this->shopRepo->save($shop, $contacts);

            $this->session->getFlashBag("success", "Magasin enregistré");

            return true;
        }

        return false;
    }
}
