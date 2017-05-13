<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use AppBundle\Entity\Dogs;

class LittersType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('ldate', null, ['label' => 'total.date'])
                ->add('mother', null, ['label' => 'total.mother'])
                ->add('father', null, ['label' => 'total.father'])
                ->add('dogs', CollectionType::class, [
                    'required' => false,
                    'by_reference' => false,
                    'entry_type' => ChildDogType::class,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'prototype' => true,
                    'label' => 'total.dogs',
                ])
                ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Litters'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_litters';
    }


}
