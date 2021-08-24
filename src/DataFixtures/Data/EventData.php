<?php

namespace App\DataFixtures\Data;

class EventData
{
    public static $eventData = [
        [
            'name' => 'Vernissage',
            'description' => 'Nous vous invitons, dans la cour de l\'ENSA afin de fêter ensemble le commencement d\'une belle aventure qui sera jonché de surprises',
            'start_datetime' => '07-03-2022 19:30:00',
            'end_datetime' => '07-03-2022 23:00:00',
            'place_id' => 1
        ],

        [
            'name' => 'Apéro Lumière',
            'description' => 'L\'équipe CHKT, vous propose un apéro mix qui aura pour objectif de vous faire oublier votre journée de travail',
            'start_datetime' => '07-03-2022 19:30:00',
            'end_datetime' => '07-03-2022 23:00:00',
            'place_id' => 2
        ],

        [
            'name' => 'Lumière sur cour',
            'description' => 'test',
            'start_datetime' => '07-03-2022 19:30:00',
            'end_datetime' => '07-03-2022 23:00:00',
            'place_id' => 3
        ],

        [
            'name' => 'Patrimoine illuminé',
            'description' => 'test',
            'start_datetime' => '07-03-2022 19:30:00',
            'end_datetime' => '07-03-2022 23:00:00',
            'place_id' => 4
        ],

        [
            'name' => 'La forêt de lumière',
            'description' => 'test',
            'start_datetime' => '07-03-2022 19:30:00',
            'end_datetime' => '07-03-2022 23:00:00',
            'place_id' => 5
        ],
    ];

    public static $placeData;


    public function place_id()
    {
        return $this->placeData[array_rand($this->id)];
    }
}