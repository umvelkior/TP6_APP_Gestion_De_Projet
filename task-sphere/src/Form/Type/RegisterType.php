<?php

namespace App\Form;

use App\Entity\Project;
use App\Entity\User;
use Doctrine\DBAL\Types\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class,   [
                'required' => true
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'required' => true,
                'first_option' => [
                        'placeholder' => 'Mot de passe'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
