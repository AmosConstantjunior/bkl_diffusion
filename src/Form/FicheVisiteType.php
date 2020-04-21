<?php

namespace App\Form;

use App\Entity\FicheVisite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FicheVisiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('DateIntervention')
            ->add('MontantHt')
            ->add('MontantConsommable')
            ->add('Commentaire')
            ->add('lier')
            ->add('techniciens')
            ->add('machines')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FicheVisite::class,
        ]);
    }
}
