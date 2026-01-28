<?php

namespace App\Form;

use App\Entity\Historial;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HistorialType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Fecha')
            ->add('Paciente')
            ->add('CodigoHistorial')
            ->add('Especialista')
            ->add('Alergias')
            ->add('Antecedentes')
            ->add('Sintomas')
            ->add('Diagnostico')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Historial::class,
        ]);
    }
}
