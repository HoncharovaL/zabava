<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Entity\Nursery;
use AppBundle\Entity\Litters;
use AppBundle\Entity\DogTitles;
use AppBundle\Entity\DogVaccinations;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class DogsType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('name', null, ['label' => 'dogs.about.name'])
                ->add('nameEn', null, ['label' => 'dogs.about.nameen'])
                ->add('bdate', DateType::class, ['empty_data' => new \DateTime(), 'label' => 'dogs.about.bdate'])
                ->add('description', null, ['label' => 'dogs.about.description'])
                ->add('descriptionEn', null, ['label' => 'dogs.about.descriptionen'])
                ->add('sex', ChoiceType::class, ['label' => 'dogs.about.sex', 'choices' => ['total.male' => '2', 'total.female' => '1']])
                ->add('state', ChoiceType::class, ['label' => 'dogs.about.state', 'choices' => ['total.forsale' => '0', 'продан' => '1']])
                ->add('quality', ChoiceType::class, ['label' => 'dogs.about.quality', 'choices' => ['Show' => 'Show', 'Breed' => "Breed", 'Pet' => "Pet"]])
                ->add('litters', EntityType::class, ['label' => 'dogs.about.litters', 'class' => Litters::class])
                ->add('photoFile', VichImageType::class, [
                    'label' => 'dogs.about.photoFile',
                    'required' => false,
                    'allow_delete' => true, // optional, default is true
                    'download_link' => true, // optional, default is true
                ])
                ->add('dogsPhotos', CollectionType::class, [
                    'label' => 'dogs.about.dogsPhotos',
                    'required' => false,
                    'by_reference' => false,
                    'entry_type' => DogsPhotosType::class,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'prototype' => true,
                ])
                ->add('videos', CollectionType::class, [
                    'label' => 'dogs.about.videos',
                    'required' => false,
                    'by_reference' => false,
                    'entry_type' => VideosType::class,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'prototype' => true,
                ])
                ->add('dogTitles', CollectionType::class, [
                    'label' => 'dogs.about.dogTitles',
                    'required' => false,
                    'by_reference' => false,
                    'entry_type' => DogTitlesType::class,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'prototype' => true,
                ])
                ->add('dogVaccinations', CollectionType::class, [
                    'label' => 'dogs.about.dogVaccinations',
                    'required' => false,
                    'by_reference' => false,
                    'entry_type' => DogVaccinationsType::class,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'prototype' => true,
                ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Dogs'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'appbundle_dogs';
    }

}
