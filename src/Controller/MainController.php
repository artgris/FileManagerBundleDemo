<?php

namespace App\Controller;

use App\Form\MediaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig');
    }

    #[Route('/media', name: 'media')]
    public function media(): Response
    {
        $form = $this->createForm(MediaType::class);
        return $this->render('main/media.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
