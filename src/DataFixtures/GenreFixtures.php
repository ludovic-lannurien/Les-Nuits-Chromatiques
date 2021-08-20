<?php

namespace App\DataFixtures;

use App\Entity\Genre;
use App\Service\MySlugger;
use App\DataFixtures\Data\GenreData;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class GenreFixtures extends Fixture
{
    private $mySlugger;

    public function __construct(MySlugger $mySlugger)
    {
        $this->mySlugger = $mySlugger;
    }
    
    public function load(ObjectManager $manager)
    {
        foreach (GenreData::$genreData as $data) {
            $genre = new Genre();

            $genre->setName($data['name']);
            $genre->setSlug($this->mySlugger->slugify($genre->getName()));

            $manager->persist($genre);
        }

        $manager->flush();
    }
}
