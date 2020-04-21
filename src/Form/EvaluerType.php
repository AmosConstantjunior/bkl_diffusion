<?php

namespace App\Form;

use App\Entity\Evaluer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvaluerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Note')
            ->add('conclusion')
            ->add('Action')
            ->add('evalu')
            ->add('evaluation')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Evaluer::class,
        ]);
    }
}
