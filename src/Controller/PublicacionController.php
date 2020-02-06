<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PublicacionController extends AbstractController
{
    /**
     * @Route("/publicacion", name="publicacion")
     */
    public function index()
    {
        return $this->render('publicacion/index.html.twig', [
            'controller_name' => 'PublicacionController',
        ]);
    }
}
