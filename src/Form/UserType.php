<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Validator\Constraints\NotCompromisedPassword;

class UserType extends AbstractType
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
                $form = $event->getForm();

                $user = $event->getData();

                if ($user->getId() === null) {
                    $form->add('password', RepeatedType::class, [
                        'type' => PasswordType::class,
                        'invalid_message' => 'Les mots de passe ne correspondent pas.',
                        'first_options'  => [
                            'constraints' => new NotBlank(),
                            'label' => 'Mot de passe',
                            'help' => '8 caractères minimum, avec au moins une lettre, un chiffre et un caractère spécial.'
                        ],
                        'second_options' => ['label' => 'Répéter le mot de passe'],
                    ]);
                } else {
                    $form->add('password', RepeatedType::class, [
                        'type' => PasswordType::class,
                        'invalid_message' => 'Les mots de passe ne correspondent pas.',
                        'mapped' => false,
                        'first_options'  => [
                            'constraints' => [
                                new Regex('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&-\/])[A-Za-z\d@$!%*#?&-\/]{8,}$/'),
                                new NotCompromisedPassword()
                            ],
                            'attr' => [
                                'placeholder' => 'Laissez vide si inchangé...',
                            ],
                            'label' => 'Mot de passe',
                            'help' => '8 caractères minimum, avec au moins une lettre, un chiffre et un caractère spécial.'
                        ],
                        'second_options' => ['label' => 'Répéter le mot de passe'],
                    ]);
                }
            });

        if ($this->security->isGranted('ROLE_SUPER_ADMIN')) {
            $builder
                ->add('roles', ChoiceType::class, [
                    'label' => 'Rôle',
                    'choices' => [
                        'Administrateur' => 'ROLE_ADMIN',
                        'Super-administrateur' => 'ROLE_SUPER_ADMIN'
                    ],
                    'multiple' => true,
                    'expanded' => true
                ]);
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
