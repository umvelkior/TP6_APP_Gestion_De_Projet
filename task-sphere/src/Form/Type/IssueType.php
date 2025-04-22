<?php

namespace App\Form\Type;

use App\Entity\Issue;
use App\Entity\Project;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use App\Enum\IssueType as IssueTypeEnum;
use App\Enum\IssueStatus;
use Symfony\Bundle\SecurityBundle\Security;

class IssueType extends AbstractType
{
    public function __construct(
        private readonly Security $security
    ){
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        /** @var Project $project */ 
        $project = $this->security->getUser()->getSelectedProject();
        $builder
            ->add('project', EntityType::class, [
                'attr' => [
                    'class' => 'd-none'
                ],
                'class' => Project::class,
                'data' => $project,
                'label' => false,
            ])
            ->add('type', EnumType::class, [
                'choice_label' => fn(\App\Enum\IssueType $type) => $type->label(),
                'class' => \App\Enum\IssueType::class,
                'data' => \App\Enum\IssueType::BUG,
                'label' => 'Type'
            ])
            ->add('status', EnumType::class, [
                'choice_label' => fn(IssueStatus $status) => $status->label(),
                'class' => \App\Enum\IssueStatus::class,
                'data' => \App\Enum\IssueStatus::NEW,
                'label' => 'Statut'
            ])
            ->add('summary', TextType::class, [
                'label' => 'Résumé'
            ])
            ->add('assignee', EntityType::class, [
                'class' => User::class,
                'choices' => $project->getMembers(),
                'placeholder' => 'Assigné',
                'label' => 'Assigné',
            ])
            ->add('reporter', EntityType::class, [
                'class' => User::class,
                'choices' => $project->getMembers(),
                'data' => $this->security->getUser(),
                'label' => 'Rapporteur'
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Créer'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Issue::class,
        ]);
    }
}
