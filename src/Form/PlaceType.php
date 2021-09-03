<?php

namespace App\Form;

use App\Entity\Place;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class PlaceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, ['label' => 'Nom'])
            ->add('address', TextType::class, ['label' => 'Adresse'])
            ->add('zipCode', IntegerType::class, ['label' => 'Code postal'])
            ->add('city', TextType::class, ['label' => 'Ville'])
            ->add('longitude')
            ->add('latitude')
            ->add('description')
            ->add('picture', UrlType::class, [
                'label' => 'Image',
                'help' => 'Lien url de l\'image'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Place::class
        ]);
    }
}
