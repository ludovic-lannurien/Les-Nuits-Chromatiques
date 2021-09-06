<?php

namespace App\Form;

use App\Entity\Event;
use App\Entity\Place;
use App\Entity\Artist;
use App\Repository\PlaceRepository;
use App\Repository\ArtistRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, ['label' => 'Nom de l\'évènement'])
            ->add('description')
            ->add('startDatetime', null, [
                'label' => 'Date et heure de début',
                'years' => range(date('Y') - 0, date('Y') + 10)
            ])
            ->add('endDatetime', null, [
                'label' => 'Date et heure de fin',
                'years' => range(date('Y') - 0, date('Y') + 10)
            ])
            ->add('artists', EntityType::class, [
                'label' => 'Artiste(s)',
                'class' => Artist::class,
                'multiple' => true,
                'choice_label' => function ($artist) {
                    $firstname = $artist->getFirstname();
                    $lastname = $artist->getLastname();
                    return $firstname . ' ' . $lastname;
                },
                'expanded' => true,
                'query_builder' => function (ArtistRepository $ar) {
                    return $ar->createQueryBuilder('a')
                        ->orderBy('a.firstname', 'ASC');
                },
            ])
            ->add('place', EntityType::class, [
                'label' => 'Lieu',
                'class' => Place::class,
                'placeholder' => '-- Choisissez un lieu --',
                'choice_label' => 'name',
                'query_builder' => function (PlaceRepository $pr) {
                    return $pr->createQueryBuilder('p')
                        ->orderBy('p.name', 'ASC');
                },
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
