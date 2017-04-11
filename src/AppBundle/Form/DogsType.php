<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Entity\Nursery;
use AppBundle\Entity\Litters;
use AppBundle\Entity\DogTitles;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class DogsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
                ->add('bdate', DateType::class, ['data' => new \DateTime()])
                ->add('description')
                ->add('photo')
                ->add('quality')
                ->add('sex', ChoiceType::class, ['choices' => ['Male' => 'male', 'Female' => "female"]])
                ->add('nursery', EntityType::class, ['class' => Nursery::class])
                ->add('litters', EntityType::class, ['class' => Litters::class])
                ->add('dogtitles', EntityType::class,['class' => DogTitles::class]);
//                ->add('idLitter');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Dogs'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_dogs';
    }


}
