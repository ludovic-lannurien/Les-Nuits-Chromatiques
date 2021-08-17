<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\Event;
use App\Service\MySlugger;
use App\DataFixtures\Data\EventData;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class EventFixtures extends Fixture
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
            $event->setEndDatetime(new DateTime($data['end_datetime']));
            $event->setDescription($data['description']);
            $event->setSlug($this->mySlugger->slugify($event->getName()));
            // $event->setPlace();
            
            $manager->persist($event);
        };

        $manager->flush();
    }
}
