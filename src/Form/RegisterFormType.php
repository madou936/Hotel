<?php

namespace App\Form;

use App\Entity\Membre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegisterFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pseudo', TextType::class, [
                'label' => 'Votre pseudo',
                'constraints' => [
                    new NotBlank([
                       'message' => 'Désolé ce champ ne peut pas être vide.'
                    ]),
                ], 
            ])
            ->add('nom', TextType::class, [
                'label' => 'Votre nom',
                'constraints' => [
                    new NotBlank([
                       'message' => 'Désolé ce champ ne peut pas être vide.'
                    ]),
                ], 
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Votre prénom',
                'constraints' => [
                    new NotBlank([
                       'message' => 'Désolé ce champ ne peut pas être vide.'
                    ]),
                ], 
            ])
            ->add('email', EmailType::class, [
                'label' => 'Votre e-mail',
                'constraints' => [
                    new Email([
                        'message' => "Votre email n'est pas au bon format : mail@exemple.fr"
                    ]),
                    new NotBlank([
                        'message' => 'Désolé ce champ ne peut pas être vide.'    
                    ]),
                    new Length([
                        'min' => 4,
                        'max' => 180,
                        'minMessage' => "Votre email doit avoir {{ limit }} caractères minimum.",
                        'maxMessage' => "Votre email doit avoir {{ limit }} caractères maximum."
                    ])
                ], 
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Votre mot de passe',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Ce champ ne peut être vide.'
                    ]),
                    new Length([
                        'min' => 4,
                        'max' => 255,
                        'minMessage' => "Votre mot de passe doit avoir {{ limit }} caractères minimum.",
                        'maxMessage' => "Votre mot de passe doit avoir {{ limit }} caractères maximum."
                    ])
                ],
            ])
            ->add('civilite', ChoiceType::class, [
                'label' => 'Sexe',
                'expanded' => true,
                'choices' => [
                    'Homme' => 'homme',
                    'Femme' => 'femme'
                ],
                'choice_attr' => [
                    "Homme" => ['selected' => 'selected']
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Désolé ce champ ne peut pas étre vide'
                    ]),
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Valider l\'inscription',
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
            'data_class' => Membre::class,
        ]);
    }
}
