<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 12:48
 */

namespace App\Domain\Form;


use App\Domain\DTO\CreationShopFormDTO;
use App\Domain\Models\Region;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreationShopForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('address', TextType::class)
            ->add('zip', TextType::class)
            ->add('city', TextType::class)
            ->add('region', EntityType::class, [
                'class' => Region::class,
                'choice_label' => 'region',
                'constraints' => new UniqueEntity(['fields' => 'id'])
            ])
            ->add('contact', CollectionType::class, [
                'entry_type' => ContactCreationForm::class,
                'entry_options' => [
                    'attr' => ['class' => 'contact']
                ],
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true
            ])
            ->add('number', TextType::class, [
                'required' => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CreationShopFormDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new CreationShopFormDTO(
                   $form->get('name')->getData(),
                   $form->get('address')->getData(),
                   $form->get('zip')->getData(),
                   $form->get('city')->getData(),
                   $form->get('contact')->getData(),
                   $form->get('region')->getData(),
                   $form->get('number')->getData()
                );
            }
        ]);
    }
}