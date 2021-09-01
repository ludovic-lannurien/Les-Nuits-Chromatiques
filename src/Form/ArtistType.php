<?php

namespace App\Form;

use App\Entity\Genre;
use App\Entity\Artist;
use App\Repository\GenreRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ArtistType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Prénom / Nom de scène',
                'help' => 'Prénom ou nom de scène si un seul nom'
                ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'help' => 'Nom de famille (facultatif si nom de scène)'
            ])
            ->add('picture', UrlType::class, [
                'label' => 'Image',
                'help' => 'Lien url de l\'image'
                ])
            ->add('description')
            ->add('videoLink', TextType::class, [
                'label' => 'Intégration vidéo',
                'help' => '<iframe>',
            ])
            ->add('genres', EntityType::class, [
                'class' => Genre::class,
                'multiple' => true,
                'expanded' => true,
                'query_builder' => function (GenreRepository $gr) {
                    return $gr->createQueryBuilder('g')
                        ->orderBy('g.name', 'ASC');
                },
                'choice_label' => 'name'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Artist::class,
        ]);
    }
}
