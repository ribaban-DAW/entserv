<?php

namespace App\Form;

use App\Entity\Zonas;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ZonasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('poblacion', null, [
                'label' => 'Población',
            ])
            ->add('provincia')
            ->add('codigopostal', null, [
                'label' => 'Código Postal',
            ])
            ->add('pais', null, [
                'label' => 'País',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Zonas::class,
        ]);
    }
}
