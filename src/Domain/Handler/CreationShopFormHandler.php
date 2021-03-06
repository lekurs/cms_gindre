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
use App\Domain\Factory\Interfaces\ShopTypeFactoryInterface;
use App\Domain\Handler\Interfaces\CreationShopFormHandlerInterface;
use App\Domain\Repository\DepartementRepository;
use App\Domain\Repository\Interfaces\ShopRepositoryInterface;
use App\Services\Interfaces\SlugHelperInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CreationShopFormHandler implements CreationShopFormHandlerInterface
{
    /**
     * @var DepartementRepository
     */
    private $departementRepo;

    /**
     * @var ShopFactoryInterface
     */
    private $shopFactory;

    /**
     * @var ContactFactoryInterface
     */
    private $contactFactory;

    /**
     * @var ShopTypeFactoryInterface
     */
    private $shopTypeFactory;

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
     *
     * @param DepartementRepository $departementRepo
     * @param ShopFactoryInterface $shopFactory
     * @param ContactFactoryInterface $contactFactory
     * @param ShopRepositoryInterface $shopRepo
     * @param SlugHelperInterface $slugHelper
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(
        DepartementRepository $departementRepo,
        ShopFactoryInterface $shopFactory,
        ContactFactoryInterface $contactFactory,
        ShopTypeFactoryInterface $shopTypeFactory,
        ShopRepositoryInterface $shopRepo,
        SlugHelperInterface $slugHelper,
        SessionInterface $session,
        ValidatorInterface $validator
    ) {
        $this->departementRepo = $departementRepo;
        $this->shopFactory = $shopFactory;
        $this->contactFactory = $contactFactory;
        $this->shopTypeFactory = $shopTypeFactory;
        $this->shopRepo = $shopRepo;
        $this->slugHelper = $slugHelper;
        $this->session = $session;
        $this->validator = $validator;
    }


    /**
     * @param FormInterface $form
     * @return bool
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $zip = substr($form->getData()->zip, 0, 2);

            $dpt = $this->departementRepo->getOne($zip);

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

                $shopTypes = [];
                foreach ($form->getData()->shopType as $shopType) {
                    $shopTypes[] = $this->shopTypeFactory->create(
                        $shopType->getShopType()
                    );
                }

            $shop = $this->shopFactory->create(
                $form->getData()->name,
                $form->getData()->address,
                $form->getData()->zip,
                $form->getData()->city,
                $contacts ?? [],
                $shopTypes ?? [],
                $dpt->getRegion(),
                $dpt,
                $form->getData()->status,
                $form->getData()->prospect,
                $form->getData()->number,
                $this->slugHelper->replace($form->getData()->name)
            );

//            $this->validator->validate([]);

            dump($shop);

            $this->shopRepo->save($shop, $contacts);

            $this->session->getFlashBag()->add("success", "Magasin enregistré");

            return true;
        }

        return false;
    }
}
