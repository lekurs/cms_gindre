<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 24/09/2018
 * Time: 17:53
 */

namespace App\Domain\Form;


use App\Domain\DTO\MessageCreationFormDTO;
use App\Domain\Models\ContactType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MessageCreationForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('message', TextareaType::class,[
                'attr' => ['id' => 'message'],
                'required' => false
            ])
            ->add('contactType', EntityType::class, [
                'class' => ContactType::class,
                'choice_label' => 'type',
                'constraints' => new UniqueEntity(['fields' => 'id']),
                'label' => 'Type de contact'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MessageCreationFormDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new MessageCreationFormDTO(
                   $form->get('message')->getData(),
                   $form->get('contactType')->getData()
                );
            }
        ]);
    }
}