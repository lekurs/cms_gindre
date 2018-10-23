<?php
/**
 * Created by PhpStorm.
 * User: bidule
 * Date: 23/10/2018
 * Time: 15:04
 */

namespace App\Domain\Form;


use App\Domain\DTO\LoginFormDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LoginForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class)
            ->add('password', PasswordType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LoginFormDTO::class,
            'empty_data' =>function (FormInterface $form) {
                return new LoginFormDTO(
                    $form->get('username')->getData(),
                    $form->get('password')->getData()
                );
            }
        ]);
    }
}
