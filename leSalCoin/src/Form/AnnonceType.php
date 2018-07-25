<?php

namespace App\Form;

use App\Entity\Annonce;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('createAt')
            ->add('region', ChoiceType::class, array('choices' => array(
                'Choose your area' => null,
                'Bourgogne-Franche-Comté' => 'Bourgogne-Franche-Comté',
                'Bretagne' => 'Bretagne',
                'Centre-Val de Loire' => 'Centre-Val de Loire',
                'Corse' => 'Corse',
                'Grand Est' => 'Grand Est',
                'Hauts-de-France' => 'Hauts-de-France',
                'Île-de-France' => 'Île-de-France',
                'Normandie' => 'Normandie',
                'Nouvelle-Aquitaine' => 'Nouvelle-Aquitaine',
                'Occitanie' => 'Occitanie',
                'Pays de la Loire' => 'Pays de la Loire',
                "Provence-Alpes-Côte d'Azur" => "Provence-Alpes-Côte d'Azur")))
            ->add('categorie')
            ->add('detail')
            ->add('picture', FileType::class, array(
                'label' => 'Ajouter une photo'))
            ->add('save', SubmitType::class, array('label' => 'Ajouter annonce !'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }
}
