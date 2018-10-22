<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 22/10/2018
 * Time: 23:13
 */

namespace App\Domain\Form;


use App\Domain\DTO\CommandeEditDTO;
use App\Domain\Models\ProductType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeEditForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('amount', TextType::class)
            ->add('productType', EntityType::class, [
                'class' => ProductType::class,
                'choice_label' => 'product'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CommandeEditDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new CommandeEditDTO(
                    $form->get('amount')->getData(),
                    $form->get('productType')->getData()
                );
            }
        ]);
    }
}
