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
        $builder->add('name')
                ->add('nameEn')
              //  ->add('bdate', DateType::class, ['data' => new \DateTime()])
                ->add('description')
                ->add('descriptionEn')
                ->add('sex', ChoiceType::class, ['choices' => ['total.male' => '2', 'total.female' => '1']])
                ->add('photoFile', VichImageType::class, [
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
