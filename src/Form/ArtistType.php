<?php

namespace App\Form;

use App\Entity\Artist;
use App\Entity\Event;
use App\Repository\EventRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ArtistType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('picture')
            ->add('description')
            ->add('videoLink')
            ->add('type')
            ->add('slug')
            // ->add('events')

            ->add('events', EntityType::class, [
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
