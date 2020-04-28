<?php

namespace App\Form;


use App\Entity\FicheVisite;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
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
            ->add('ValiseCNOMO')
           ->add('cuproBrasage')
            ->add('BesoinFormation')
             ->add('SoudageMonoFace')
              ->add('LigneElectrice')
            ->add('clients', EntityType::class,[
                'class' => 'App\Entity\Clients',
                'placeholder' => "Selection le client",
                "mapped" => false,
                'required' => false
                ])

            

            ->add('atelier', EntityType::class,[
                'class' => 'App\Entity\Atelier',
                'placeholder' => "Selection l'atelier"
            ])
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
