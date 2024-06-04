<?php

namespace App\Form;

use Arkounay\Bundle\UxMediaBundle\Form\UxMediaCollectionType;
use Arkounay\Bundle\UxMediaBundle\Form\UxMediaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MediaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('media', UxMediaType::class, [
                'mapped' => false,
                'conf' => 'default',
                'display_file_manager' => true,
                'display_clear_button' => true,
                'allow_crop' => true,
                'crop_options' => [
                    'display_crop_data' => true,
                    'allow_flip' => true,
                    'allow_rotation' => true,
                    'ratio' => false,
                ]
            ])
            ->add('media_collection', UxMediaCollectionType::class, [
                'mapped' => false,
                'conf' => 'default',
                'min' => 3
            ]);
    }

}
