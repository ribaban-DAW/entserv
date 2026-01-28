<?php

namespace App\Form;

use App\Entity\Piedra;
use App\Entity\Pintura;
use App\Entity\Producto;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre')
            ->add('piedra', EntityType::class, [
                'class' => Piedra::class,
                'choice_label' => 'tipo',
            ])
            ->add('pintura', EntityType::class, [
                'class' => Pintura::class,
                'choice_label' => 'color',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Producto::class,
        ]);
    }
}
