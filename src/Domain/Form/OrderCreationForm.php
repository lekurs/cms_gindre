<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 22/10/2018
 * Time: 18:29
 */

namespace App\Domain\Form;


use App\Domain\DTO\OrderCreationDTO;
use App\Domain\Models\ProductType;
use App\Domain\Models\Shop;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderCreationForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('productType', EntityType::class, [
                'class' => ProductType::class,
                'choice_label' => 'product'
            ])
            ->add('dateOrder', DateType::class, [

            ])
            ->add('amount', TextType::class, []);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => OrderCreationDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new OrderCreationDTO(
                   $form->get('dateOrder')->getData(),
                   $form->get('productType')->getData(),
                   $form->get('amount')->getData()
                );
            }
        ]);
    }
}
