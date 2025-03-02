<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
        ->add('prenom', TextType::class, [
            'label' => 'Votre prenom',
                 
        ])
        
        ->add('nom', TextType::class, [
            'label' => 'Votre nom',
               
        ])
        
        ->add('email', EmailType::class, [
            'label' => 'Votre e-mail',
            
        ])
        
        ->add('sujet', TextType::class, [
            'label' => 'Votre sujet ',
                      
        ])
        
        
        ->add('categorie', ChoiceType::class, [
            'label' => 'Categorie',
            'expanded' => true,
                'choices' => [
                    'Chambre' => 'chambre',
                    'Restaurant' => 'restaurant',
                    'Spa' => 'spa',
                    'Sujet general' => 'sujet general',
                ],
                'choice_attr' => [
                    "Chambre" => ['selected' => 'selected']

                ]  

        ])
        ->add('message', TextareaType::class, [
            'label' => 'Votre message ',
                
        ])

         ->add('submit', SubmitType::class, [

            'label' => 'Valider',
           
            
            'validate' => false,
            'attr' => [
                'class' => 'd-block col-4 my-4 mx-auto btn btn-primary'
            ]
        ])
       ;
        
    }



    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
