<?php

namespace App\Form;

use App\Entity\Chambre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ChambreFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => "Titre de l'annoce"
                ],
            ])
            ->add('descriptionCourte', TextareaType::class, [
                'label' => 'Description (courte)',
                'attr' => [
                    'placeholder' => 'Description de la chambre'
                ],
            ])
            ->add('descriptionLongue', TextareaType::class, [
                'label' => 'Description (longue)',
                'attr' => [
                    'placeholder' => 'Description de la chambre'
                ],
                ])
            ->add('photo', FileType::class, [
                'label' => "Photo",
                'data_class' => null,
                'constraints' => [
                    new Image([
                        'mimeTypes' => ['image/jpeg', 'image/png'],
                        'mimeTypesMessage' => 'Les formats autorisés sont .jpg ou .png',
                        'maxSize' => '3M',
                        'maxSizeMessage' => 'Le poids maximal du fichier est : {{ limit }} {{ suffix }} ({{ name }}: {{ size }} {{ suffix }})',
                    ])
                ]
             ])
            ->add('prixJournalier', TextType::class, [
                'label' => 'Prix',
                'attr' => [
                    'placeholder' => 'Prix €'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Chambre::class,
        ]);
    }
}
