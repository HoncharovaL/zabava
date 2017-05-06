<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Vich\UploaderBundle\Form\Type\VichFileType;


class NurseryType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
$builder->add('nameNur', null, array('label' => 'Название питомника'))
        ->add('nameNur_en', null, array('label' => 'Название питомника(англ)'))
        ->add('bdate', null, array('label' => 'Дата основания'))
        ->add('owner', null, array('label' => 'Владелец'))
        ->add('ownerEn', null, array('label' => 'Владелец(англ)'))
        ->add('adress', null, array('label' => 'Адрес'))
        ->add('adressEn', null, array('label' => 'Адрес(англ)'))
        ->add('phone', null, array('label' => 'Телефон'))
        ->add('cellphone', null, array('label' => 'Мобильный телефон'))
        ->add('email', null, array('label' => 'Электронный почтовый ящик'))     
        ->add('site', null, array('label' => 'Сайт'))
        ->add('about', null, array('label' => 'О нас '))
        ->add('aboutEn', null, array('label' => 'О нас (англ)'))
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
