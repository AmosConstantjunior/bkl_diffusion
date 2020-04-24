<?php

namespace App\Form;

use App\Entity\Atelier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Atelier1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('AdresseAtelier')
            ->add('EmailAdresse')
            ->add('NomCarrosserie')
            ->add('certifier')
            ->add('attesterCQS')
            ->add('ville')
            ->add('contrats')
            ->add('clients')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Atelier::class,
        ]);
    }
}
