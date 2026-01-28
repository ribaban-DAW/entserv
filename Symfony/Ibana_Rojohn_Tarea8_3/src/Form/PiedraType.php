<?php

namespace App\Form;

use App\Entity\Piedra;
use App\Entity\Zonas;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PiedraType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('tipo')
            ->add('tamano', null, [
                'label' => 'Tamaño',
            ])
            ->add('color')
            ->add('composicion', null, [
                'label' => 'Composición',
            ])
            ->add('cantidad')
            ->add('zona', EntityType::class, [
                'class' => Zonas::class,
                'choice_label' => 'poblacion',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Piedra::class,
        ]);
    }
}
