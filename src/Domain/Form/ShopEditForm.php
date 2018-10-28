<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 28/10/2018
 * Time: 10:31
 */

namespace App\Domain\Form;


use App\Domain\DTO\ShopEditFormDTO;
use App\Domain\Models\StatusShop;
use App\Subscriber\Interfaces\ShopEditSlugSubscriberInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ShopEditForm extends AbstractType
{
    /**
     * @var ShopEditSlugSubscriberInterface
     */
    private $editSlugShopSubscriber;

    /**
     * ShopEditForm constructor.
     *
     * @param ShopEditSlugSubscriberInterface $editSlugShopSubscriber
     */
    public function __construct(ShopEditSlugSubscriberInterface $editSlugShopSubscriber)
    {
        $this->editSlugShopSubscriber = $editSlugShopSubscriber;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('address', TextType::class)
            ->add('zip', IntegerType::class)
            ->add('city', TextType::class)
            ->add('prospect', ChoiceType::class, [
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'Client' => false,
                    'Prospect' => true
                ],
                'label_attr' => ['class' => 'radio-label'],
                'label' => 'Type de client *'
            ])
            ->add('number', TextType::class)
            ->add('status', EntityType::class, [
                'class' => StatusShop::class,
                'choice_label' => 'status',
                'expanded' => true,
                'multiple' => false,
                'constraints' => new UniqueEntity(['fields' => 'id']),
                'label' => 'Statuts *'
            ])
            ->addEventSubscriber($this->editSlugShopSubscriber);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ShopEditFormDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new ShopEditFormDTO(
                    $form->get('name')->getData(),
                    $form->get('address')->getData(),
                    $form->get('zip')->getData(),
                    $form->get('city')->getData(),
                    $form->get('prospect')->getData(),
                    $form->get('number')->getData()
                );
            }
        ]);
    }
}
