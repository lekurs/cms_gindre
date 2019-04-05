<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 2019-03-11
 * Time: 13:53
 */

namespace App\Domain\Form;


use App\Domain\DTO\SendEmailCreationFormDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SendEmailFormCreation extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('to', TextType::class, [
                'required' => false,
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Ecrire à ',
            ])
            ->add('title', TextType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Titre du mail',
            ])
            ->add('message', TextareaType::class, [
                'required' => false,
                'attr' => ['class' => 'floating-input textarea-mout', 'placeholder' => ' '],
                'label' => 'Tapez votre message ici',
                'label_attr' => ['class' => 'float']
            ])
        ->add('file', FileType::class, [
            'required' => false,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SendEmailCreationFormDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new SendEmailCreationFormDTO(
                    $form->get('title')->getData(),
                    $form->get('message')->getData(),
                    $form->get('file')->getData(),
                    $form->get('to')->getData()
                );
            }
        ]);
    }
}
