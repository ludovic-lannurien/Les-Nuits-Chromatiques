<?php

namespace App\DataFixtures;

use App\DataFixtures\Data\EventData;
use App\Entity\Event;
use App\Service\MySlugger;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use DateTime;

class PlaceFixtures extends Fixture
{
    private $mySlugger;

    public function __construct(MySlugger $mySlugger)
    {
        $this->mySlugger = $mySlugger;
    }

    public function load(ObjectManager $manager)
    {
        foreach (EventData::$eventData as $data) {

            $event = new Event();

            $event->setName($data['name']);
            $event->setStartDatetime(new DateTime($data['start_datetime']));
            $event->setEndDatetime($data['end_datetime']);
            $event->setDescription($data['description']);
            $event->setSlug($this->mySlugger->slugify($event->getName()));

            $manager->persist($event);
        };

        $manager->flush();
    }
}
