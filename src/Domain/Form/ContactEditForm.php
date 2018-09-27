<?php
/**
 * Created by PhpStorm.
 * User: Maxime GINDRE
 * Date: 27/09/2018
 * Time: 16:21
 */

namespace App\Domain\Form;


use App\Domain\DTO\ContactEditFormDTO;
use App\Domain\Models\Role;
use App\Subscriber\Interfaces\ContactEditSlugSubscriberInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactEditForm extends AbstractType
{
    /**
     * @var ContactEditSlugSubscriberInterface
     */
    private $editSlugSubscriber;

    /**
     * ContactEditForm constructor.
     * @param ContactEditSlugSubscriberInterface $editSlugSubscriber
     */
    public function __construct(ContactEditSlugSubscriberInterface $editSlugSubscriber)
    {
        $this->editSlugSubscriber = $editSlugSubscriber;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('lastName', TextType::class)
            ->add('phoneOne', TelType::class, [
                'required' => false,
            ])
            ->add('phoneMobile', TelType::class)
            ->add('email', EmailType::class)
            ->add('role', EntityType::class, [
                'class' => Role::class,
                'choice_label' => 'role',
                'constraints' => new UniqueEntity(['fields' => 'id'])
            ])
            ->add('main', CheckboxType::class, [
                'required' => false,
                'data' => true
            ])
            ->add('id', HiddenType::class)
            ->addEventSubscriber($this->editSlugSubscriber);
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ContactEditFormDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new ContactEditFormDTO(
                    $form->get('id')->getData(),
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
