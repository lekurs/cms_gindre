<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 12:52
 */

namespace App\Domain\Form;


use App\Domain\DTO\ContactCreationFormDTO;
use App\Domain\Models\Role;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactCreationForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom *',
                'required' => true,
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Prénom *',
                'required' => true,
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' ']
            ])
            ->add('phoneOne', TelType::class, [
                'label' => 'Teléphone Fixe',
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'required' => false,
            ])
            ->add('phoneMobile', TelType::class, [
                'label' => 'Téléphone mobile *',
                'required' => true,
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' ']
            ])
            ->add('email', EmailType::class, [
                'required' => true,
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'email@email.com'
            ])
            ->add('role', EntityType::class, [
                'class' => Role::class,
                'choice_label' => 'role',
                'constraints' => new UniqueEntity(['fields' => 'id']),
                'label' => 'Statut du contact'
            ])
            ->add('main', CheckboxType::class,[
                'required' => false,
                'data' => true,
                'label' => 'Contact principal ?'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ContactCreationFormDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new ContactCreationFormDTO(
                   $form->get('name')->getData(),
                   $form->get('lastName')->getData(),
                   $form->get('phoneOne')->getData(),
                   $form->get('phoneMobile')->getData(),
                   $form->get('email')->getData(),
                   $form->get('role')->getData(),
                   $form->get('main')->getData()
                );
            }
        ]);
    }
}