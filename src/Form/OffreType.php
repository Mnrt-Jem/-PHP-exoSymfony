<?php

namespace App\Form;

use App\Entity\competence;
use App\Entity\contrat;
use App\Entity\job;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class OffreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('description')
            ->add('IdContrat', EntityType::class, array(
                'class' => contrat::class,
                'choice_label' => 'IdContrat'
            ))
            ->add('Idjob', EntityType::class, array(
                'class' => job::class,
                'choice_label' => 'Idjob'
            ))
            ->add('idCompetence', EntityType::class, array(
                'class' => competence::class,
                'choice_label' => 'Idcompetence'
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Offre::class,
        ]);
    }
}
