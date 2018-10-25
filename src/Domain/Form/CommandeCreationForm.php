<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 22/10/2018
 * Time: 18:29
 */

namespace App\Domain\Form;


use App\Domain\DTO\CommandeCreationDTO;
use App\Domain\Models\ProductType;
use App\Domain\Models\Shop;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeCreationForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('productType', EntityType::class, [
                'class' => ProductType::class,
                'choice_label' => 'product',
                'label' => 'Type de produit',
                'label_attr' => ['class' => 'select-product']
            ])
            ->add('dateOrder', DateType::class, [
                'label' => 'Date de commande',
                'required' => true,
            ])
            ->add('amount', TextType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Total € HT',
                'required' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CommandeCreationDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new CommandeCreationDTO(
                   $form->get('dateOrder')->getData(),
                   $form->get('productType')->getData(),
                   $form->get('amount')->getData()
                );
            }
        ]);
    }
}
