<?php

namespace App\Controller;

use App\Entity\Comentarios;
use App\Entity\Publicación;
use App\Repository\PublicaciónRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PublicacionController extends AbstractController
{
    /**
     * @Route("/ultimas", name="ultimas-publicaiones")
     */
    public function index(PublicaciónRepository $pc)
    {
        //Preguntar a los modelos
        $publicaciones = $pc->findAll();

        //Pintar en vista
        return $this->render('publicacion/index.html.twig', [
            'listado_publicaciones' => $publicaciones
        ]);
    }

    /**
     * @Route("/publicacion/{id}", name="publicacion-detalle")
     */
    public function detalle(Publicación $publicacion, Comentarios $comentario){

        return $this->render('publicacion/detalle.html.twig', [
            'publicacion' => $publicacion,
            'comentario' => $comentario
        ]);
    }
}
