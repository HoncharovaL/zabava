<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Entity\Vaccinations;

class DogVaccinationsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */ 
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('vaccinations', EntityType::class, [
                    'class' => Vaccinations::class,
                    'label' => 'vaccinations',
                ]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\DogVaccinations'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_dogvaccinations';
    }


}
