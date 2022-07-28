<?php

namespace App\Form;

use App\Entity\Commande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CommandeFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateArrivee', DateType::class, [
                'label' => 'Date d\'arrivé',
                'widget' => 'single_text'
            ])
            ->add('dateDepart', DateType::class, [
                'label' => 'Date de départ',
                'widget' => 'single_text'
            ])
            ->add('prixTotal', MoneyType::class, [
                'label' => 'Prix total',
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom',
                'constraints' => [
                    new NotBlank([
                       'message' => 'Ce champ ne peut être vide.'
                    ])
                ],
                'attr' => [
                    'placeholder' => 'Veuillez inscrire votre prénom'    
                ]
            ])
            ->add('nom', TextType::class, [
                'label' => 'Nom',
                'constraints' => [
                    new NotBlank([
                       'message' => 'Ce champ ne peut être vide.'
                    ])
                ],
                'attr' => [
                    'placeholder' => 'Veuillez inscrire votre nom'    
                ]
            ])
            ->add('telephone', NumberType::class, [
                'label' => 'Téléphone',
                'constraints' => [
                    new NotBlank([
                       'message' => 'Ce champ ne peut être vide.'
                    ])
                ],
                'attr' => [
                    'placeholder' => 'Veuillez inscrire votre N° de téléphone'    
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'E-mail',
                'constraints' => [
                    new NotBlank([
                       'message' => 'Ce champ ne peut être vide.'
                    ])
                ],
                'attr' => [
                        'placeholder' => 'Veuillez inscrire votre e-mail'    
                    ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Valider ma résérvation',
                'validate' => false,
                'attr' => [
                    'class' => 'd-block col-5 my-5 mx-auto btn btn-success'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
