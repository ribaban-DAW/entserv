<?php

namespace App\Form;

use App\Entity\Doctor;
use App\Entity\Historial;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DoctorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Especialidad')
            ->add('Nombre')
            ->add('Historial', EntityType::class, [
                'class' => Historial::class,
                'choice_label' => 'CodigoHistorial',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Doctor::class,
        ]);
    }
}
