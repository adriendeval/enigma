<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TeamCreateFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('team_name', null, [
            'label' => 'Nom de l\'équipe',
            'attr' => [
                'placeholder' => 'Entrez le nom de votre équipe',
            ],
        ]);
        $builder->add('members_count', null, [
            'label' => 'Nombre de membres',
            'attr' => [
                'placeholder' => 'Entrez le nombre de membres dans votre équipe',
                'min' => 2,
                'max' => 3,
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            
        ]);
    }
}
