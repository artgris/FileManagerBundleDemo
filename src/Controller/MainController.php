<?php

namespace App\Controller;

use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index()
    {
        $form = $this->createFormBuilder()
            ->add('ckeditor', CKEditorType::class, [
                'config_name' => 'basic_config',
                'label' => 'ckeditor',
            ])
            ->add('tinymce', TextareaType::class, [
                'label' => 'tinymce',
                'attr' => [
                    'class' => 'tinymce',
                ],
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Enregistrer',
                'attr' => [
                    'class' => 'btn btn-primary',
                ],
            ])
            ->getForm();


        return $this->render('main/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/tiny4", name="tiny4")
     */
    public function tiny4()
    {
        $form = $this->createFormBuilder()
            ->add('tinymce', TextareaType::class, [
                'label' => 'tinymce',
                'attr' => [
                    'class' => 'tinymce',
                ],
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Enregistrer',
                'attr' => [
                    'class' => 'btn btn-primary',
                ],
            ])
            ->getForm();


        return $this->render('main/tiny4.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
