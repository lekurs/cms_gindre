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
            ->add('name', TextType::class)
            ->add('lastName', TextType::class)
            ->add('phoneOne', TelType::class, [
                'required' => false
            ])
            ->add('phoneMobile', TelType::class)
            ->add('email', EmailType::class)
            ->add('role', EntityType::class, [
                'class' => Role::class,
                'choice_label' => 'role',
                'constraints' => new UniqueEntity(['fields' => 'id'])
            ])
            ->add('main', CheckboxType::class,[
                'required' => false,
                'data' => true
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