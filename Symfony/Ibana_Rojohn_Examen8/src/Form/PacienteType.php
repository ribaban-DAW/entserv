<?php

namespace App\Form;

use App\Entity\Doctor;
use App\Entity\Paciente;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PacienteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nombre')
            ->add('Apellidos')
            ->add('Sexo')
            ->add('Edad')
            ->add('Doctor', EntityType::class, [
                'class' => Doctor::class,
                'choice_label' => 'Nombre',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Paciente::class,
        ]);
    }
}
