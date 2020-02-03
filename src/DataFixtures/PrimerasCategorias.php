<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PrimerasCategorias extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $categorias = ["Programacion", "Cocina", "Ajedrez", "Juegos"];

        foreach($categorias as $cat_nombre){
            $cat = new categoria();
            $cat->setNombre($cat_nombre);
            $manager->persist($cat);
        }

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
