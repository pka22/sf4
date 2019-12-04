<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use Doctrine\Common\Persistence\ObjectManager;



class ArtistFixture extends BaseFixture
{
    /*public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 50; $i++) {
            $artist = (new Artist())
                ->setName('John Doe n°'.$i)
                ->setDescription('Test des fixtures')
            ;
            $manager->persist($artist);
        }
        $manager->flush();
    }*/

    protected function loadData(ObjectManager $manager)
    {
        // Générer 50 artistes
        $this->createMany(50,function(){
            //constructiondu nom d'artiste
            $name = $this->faker->randomElement(['DJ ','MC ','Lil ',' ']);
            $name .= $this->faker->firstName;
            $name .= $this->faker->randomElement([''.$this->faker->realText(10),
                'aka'.$this->faker->domainWord,
                '$ The' .$this->faker->lastName,'']);
            //Instanciation de l'entité


            $artist = (new Artist())
                ->setName($name)
                ->setDescription( $this->faker->realText(10))
            ;
            // Toujours retourner l'entité
            return $artist;
        });
        // Pour terminer, enregistrer
        $manager->flush();
    }
}


