<?php

namespace App\Form;

use App\Entity\User;
use function PHPSTORM_META\type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType implements FormTypeInterface
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Firstname', TextType::class, ['label' => 'Prénom'])
            ->add('Lastname', TextType::class, ['label' => 'Nom'])
            ->add('Phone', TextType::class, ['label' => 'Téléphone'])
            ->add('Email', EmailType::class, ['label' => 'Email'])
            ->add('Password', PasswordType::class, ['label' => 'Mot de passe'])
            ->add('CPassword', PasswordType::class, ['label' => 'Confirmation mot de passe'])
            ->add('save', SubmitType::class, ['label' => 'Create user']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
