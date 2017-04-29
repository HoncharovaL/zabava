<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class newsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('ndate', DateType::class, ['data' => new \DateTime(),'label' => 'total.date'])
                ->add('title', null, array('label' => 'total.caption'))
                ->add('titleEn', null, array('label' => 'English version'))
                ->add('newsType', ChoiceType::class, ['choices' => ['total.exhibition' => '1', 'total.advice' => '2'],'label' => 'total.type'])
                ->add('newsdesc', null, array('label' => 'total.news'))
                ->add('newsdescEn', null, array('label' => 'English version'))
                ->add('photoFile', VichImageType::class, [
            'required' => false,
            'allow_delete' => true, // optional, default is true
            'download_link' => true, // optional, default is true
             ]);
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\news'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_news';
    }


}
