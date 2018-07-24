<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends AbstractType
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
