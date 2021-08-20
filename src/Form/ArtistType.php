<?php

namespace App\Form;

use App\Entity\Artist;
use App\Entity\Event;
use App\Repository\EventRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;

class ArtistType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, ['label' => 'Prénom'])
            ->add('lastname', TextType::class, ['label' => 'Nom'])
            ->add('picture', UrlType::class, ['label' => 'Image'])
            ->add('description')
            ->add('videoLink', UrlType::class, [
                'label' => 'Lien vidéo',
                'help' => 'Lien Youtube ou Viméo',
            ])
            ->add('genres', EntityType::class, [
                
            ])
            ->add('events', EntityType::class, [
                'label' => 'Evènements',
                'class' => Event::class,
                'multiple' => true,
                'choice_label' => 'name',
                'expanded' => true,
                'query_builder' => function (EventRepository $gr) {
                    return $gr->createQueryBuilder('g')
                        ->orderBy('g.name', 'ASC');
                },
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Artist::class,
        ]);
    }
}
