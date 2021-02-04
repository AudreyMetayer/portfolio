<?php

namespace App\Form;

use App\Entity\Language;
use App\Entity\Projet;
use App\Repository\LanguageRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Nom du projet'
                ]
            ])
            ->add('duration', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Durée du projet',
                    ]
            ])
            ->add('client', TextType::class, [
                'label' => false,
                'attr' => [
                 'placeholder' => 'Nom du client'
                    ]
            ])
            ->add('poster', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Img'
                ]
            ])
            ->add('description', TextareaType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Description'
                ]
            ])
            ->add('languages', EntityType::class, [
                'class' => Language::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'by_reference' => false,
            ]);


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Projet::class,
        ]);
    }
}
