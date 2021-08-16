<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\DBAL\Connection;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    private function truncate()
    {
        $this->connection->executeQuery('SET foreign_key_checks = 0');
        $this->connection->executeQuery('TRUNCATE TABLE artist');
        $this->connection->executeQuery('TRUNCATE TABLE event');
        $this->connection->executeQuery('TRUNCATE TABLE place');
    }

    public function load(ObjectManager $manager)
    {
        $this->truncate();
    }
}
