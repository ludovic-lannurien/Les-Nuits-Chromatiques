<?php

namespace App\DataFixtures\Data;

class EventData
{
    public static $eventData = [
        [
            'name' => 'Vernissage',
            'description' => 'Nous vous invitons, dans la cour de l\'ENSA afin de fêter ensemble le commencement d\'une belle aventure qui sera jonché de surprises',
            'start_datetime' => '07-03-2022 19:30:00',
            'end_datetime' => '09-03-2022 23:00:00',
            'place' => 'Hôtel de Vogüé'
        ],

        [
            'name' => 'Apéro Lumière',
            'description' => 'L\'équipe CHKT, vous propose un apéro mix qui aura pour objectif de vous faire oublier votre journée de travail',
            'start_datetime' => '08-03-2022 19:30:00',
            'end_datetime' => '08-03-2022 23:00:00',
            'place' => 'Musée des Beaux-Arts de Dijon'
        ],

        [
            'name' => 'Lumière sur cour',
            'description' => 'test',
            'start_datetime' => '09-03-2022 19:30:00',
            'end_datetime' => '10-03-2022 23:00:00',
            'place' => 'Cour Bareuzai'
        ],

        [
            'name' => 'Patrimoine illuminé',
            'description' => 'test',
            'start_datetime' => '10-03-2022 19:30:00',
            'end_datetime' => '11-03-2022 23:00:00',
            'place' => 'La Vapeur'
        ],

        [
            'name' => 'La forêt de lumière',
            'description' => 'test',
            'start_datetime' => '12-03-2022 19:30:00',
            'end_datetime' => '13-03-2022 23:00:00',
            'place' => 'Grand Hôtel La Cloche'
        ]
    ];
}
