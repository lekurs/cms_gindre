<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 21/09/2018
 * Time: 11:11
 */

namespace App\Domain\Form;


use App\Domain\DTO\ContactTypeCreationCreationFormDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreationContactTypeForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', TextType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ContactTypeCreationCreationFormDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new ContactTypeCreationCreationFormDTO($form->get('type')->getData());
            }
        ]);
    }
}
