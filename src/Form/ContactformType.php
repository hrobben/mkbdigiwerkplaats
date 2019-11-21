<?php

namespace App\Form;

use App\Entity\Contactform;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactformType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, ['attr' => [ 'class' => 'inputfield--contact', 'placeholder' => 'Naam' ], 'label' => false])
            ->add('email', null, ['attr' => [ 'class' => 'inputfield--contact', 'placeholder' => 'E-mail' ], 'label' => false])
            ->add('message', null, ['attr' => [ 'class' => 'inputfield--contact', 'placeholder' => 'Uw Bericht' ], 'label' => false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contactform::class,
        ]);
    }
}
