<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NurseryType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
$builder->add('nameNur', null, array('label' => 'Название питомника'))
        ->add('photo')
        ->add('bdate', null, array('label' => 'Дата основания'))
        ->add('owner', null, array('label' => 'Владелец'))
        ->add('adress', null, array('label' => 'Адрес'))
        ->add('phone', null, array('label' => 'Телефон'))
        ->add('cellphone', null, array('label' => 'Мобильный телефон'))
        ->add('email', null, array('label' => 'Электронный почтовый ящик'))     
        ->add('site', null, array('label' => 'Сайт'))
        ->add('about', null, array('label' => 'О нас '))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Nursery'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_nursery';
    }
}
