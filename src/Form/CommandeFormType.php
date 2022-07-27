<?php

namespace App\Form;

use App\Entity\Commande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class CommandeFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateArrivee', DateTimeType::class, [
                'label' => 'Date d\'arrivé',
                'widget' => 'single_text'
            ])
            ->add('dateDepart', DateTimeType::class, [
                'label' => 'Date de départ',
                'widget' => 'single_text'
            ])
            // ->add('prixTotal')
            ->add('prenom', TextType::class, [
                'label' => 'Prénom',
                'constraints' => [
                    new NotBlank([
                       'message' => 'Ce champ ne peut être vide.'
                    ]),
                ]
            ])
            ->add('nom', TextType::class, [
                'label' => 'Nom',
                'constraints' => [
                    new NotBlank([
                       'message' => 'Ce champ ne peut être vide.'
                    ]),
                ]
            ])
            ->add('telephone', NumberType::class, [
                'label' => 'Téléphone',
                'constraints' => [
                    new NotBlank([
                       'message' => 'Ce champ ne peut être vide.'
                    ]),
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'constraints' => [
                    new NotBlank([
                       'message' => 'Ce champ ne peut être vide.'
                    ]),
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Valider ma résérvation',
                'validate' => false,
                'attr' => [
                    'class' => 'd-block col-3 my-3 mx-auto btn btn-success'
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
