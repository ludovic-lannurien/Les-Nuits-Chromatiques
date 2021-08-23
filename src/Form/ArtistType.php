<?php

namespace App\Form;

use App\Entity\Event;
use App\Entity\Genre;
use App\Entity\Artist;
use App\Repository\EventRepository;
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
                'help' => 'Nom de scène si un seul nom'
                ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'help' => 'Facultatif si nom de scène'
                ])
            ->add('picture', UrlType::class, ['label' => 'Image'])
            ->add('description')
            ->add('videoLink', UrlType::class, [
                'label' => 'Lien vidéo',
                'help' => 'Lien Youtube ou Viméo',
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
            ])
            ->add('events', EntityType::class, [
                'label' => 'Evènements',
                'class' => Event::class,
                'multiple' => true,
                'expanded' => true,
                'query_builder' => function (EventRepository $er) {
                    return $er->createQueryBuilder('e')
                        ->orderBy('e.name', 'ASC');
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
