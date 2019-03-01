<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 2019-02-28
 * Time: 22:40
 */

namespace App\Domain\Form;


use App\Domain\DTO\SearchByContactDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchByContactForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'required' => false,
            ])
            ->add('lastname', TextType::class, [
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SearchByContactDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new SearchByContactDTO(
                    $form->get('name')->getData(),
                    $form->get('lastname')->getData()
                );
            }
            ]);
    }
}