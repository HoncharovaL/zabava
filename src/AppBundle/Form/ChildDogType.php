<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use AppBundle\Entity\Dogs;
use Vich\UploaderBundle\Form\Type\VichImageType;

/**
 * Description of ChildDogType
 *
 * @author Администратор
 */
class ChildDogType extends AbstractType {
    
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('name', null, ['label' => 'dogs.about.name'])
                ->add('nameEn', null, ['label' => 'dogs.about.nameen'])
                ->add('description', null, ['label' => 'dogs.about.description'])
                ->add('descriptionEn', null, ['label' => 'dogs.about.descriptionen'])
                ->add('sex', ChoiceType::class, ['label' => 'dogs.about.sex', 'choices' => ['total.male' => '2', 'total.female' => '1']])
                ->add('photoFile', VichImageType::class, [
                    'label' => 'dogs.about.photoFile',
                    'required' => false,
                    'allow_delete' => true, // optional, default is true
                    'download_link' => true, // optional, default is true
                ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => Dogs::class,
        ));
    }
}
