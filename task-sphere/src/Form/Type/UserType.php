<?php

namespace App\Form\Type;

use App\Entity\Project;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function __construct(
        private readonly Security $security
    ){ 
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        /** @var User $connectedUser */
        $connectedUser = $this->security->getUser();

        $disabled = false;

        if ($connectedUser->getId() !== $options["data"]->getId()) {
            $disabled = true;
        }

        $builder
            ->add('username', TextType::class, [
                'disabled' => $disabled,
                'label'=> "Nom d'utilisateur",
            ])
            ->add('firstName', TextType::class, [
                'disabled' => $disabled,
                'label'=> 'Prénom',
            ])
            ->add('lastName', TextType::class, [
                'disabled' => $disabled,
                'label'=> 'Nom de famille',
            ])
        ;

        if (!$disabled){
            $builder->add('submit', SubmitType::class, [
                'label'=> 'Enregistrer',
            ]);
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
