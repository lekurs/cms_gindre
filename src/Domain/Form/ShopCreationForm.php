<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 12:48
 */

namespace App\Domain\Form;


use App\Domain\DTO\ShopFormCreationDTO;
use App\Domain\Models\Region;
use App\Domain\Models\ShopType;
use App\Domain\Models\StatusShop;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ShopCreationForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Nom *'
            ])
            ->add('address', TextType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Adresse *'
            ])
            ->add('zip', TextType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Code Postal *',
            ])
            ->add('city', TextType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Ville *',
            ])
            ->add('status', EntityType::class, [
                'class' => StatusShop::class,
                'choice_label' => 'status',
                'expanded' => true,
                'multiple' => false,
                'constraints' => new UniqueEntity(['fields' => 'id']),
                'label' => 'Statuts *'
            ])
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
            ->add('shopType', EntityType::class, [
                'expanded' => true,
                'multiple' => true,
                'label' => 'Type de magasin',
                'class' => ShopType::class,
                'choice_label' => 'shopType'
            ])
            ->add('contact', CollectionType::class, [
                'entry_type' => ContactCreationForm::class,
                'entry_options' => [
                    'attr' => ['class' => 'contact']
                ],
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'block_name' => '_my_proto',
                'label_attr' => ['class' => 'legend-contact']
            ])
            ->add('number', TextType::class, [
                'required' => false,
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Numéro client personnel'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ShopFormCreationDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new ShopFormCreationDTO(
                   $form->get('name')->getData(),
                   $form->get('address')->getData(),
                   $form->get('zip')->getData(),
                   $form->get('city')->getData(),
                   $form->get('contact')->getData(),
                   $form->get('status')->getData(),
                    $form->get('prospect')->getData(),
                   $form->get('shopType')->getData(),
                   $form->get('number')->getData()
                );
            }
        ]);
    }
}