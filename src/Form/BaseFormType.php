<?php

namespace App\Form;

use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class TeamCreateFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('team_name', TextType::class, [
            'label' => 'Nom de l\'équipe',
            'attr' => [
                'placeholder' => 'Entrez le nom de votre équipe',
                'maxlength' => 50,
                'minlength' => 2,
                'class' => 'border rounded px-2 py-1 w-150 focus:outline-none focus:ring-2 focus:ring-blue-500',
            ],
        ]);
        $builder->add('members_count', ChoiceType::class, [
            'label' => 'Nombre de membres',
            'choices' => [
                '2 membres' => 2,
                '3 membres' => 3,
                '4 membres' => 4,
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            
        ]);
    }
}
