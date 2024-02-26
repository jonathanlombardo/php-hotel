<?php
    $hotels = [

        [
            'img' => '01.jpg',
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'img' => '02.jpg',
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'img' => '03.jpg',
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'img' => '04.jpg',
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'img' => '05.jpg',
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    $name_filter = $_GET["hotel-name"] ?? '';
    $park_filter = $_GET["parking-check"] ?? false;
    $vote_filter = $_GET["vote-range"] ?? 0;
    $dist_filter = $_GET["dist-range"] ?? 50;
    
    $form_sent = !empty($_GET);

    if ($form_sent) {

        $filtered_hotels = [];

        foreach ($hotels as $hotel) {
            
            if(
                str_contains($hotel["name"], $name_filter) &&
                ($park_filter ? $hotel["parking"] : true) &&
                $hotel["vote"] >= $vote_filter &&
                $hotel["distance_to_center"] <= $dist_filter
            ){
                $filtered_hotels[] = $hotel;
            }
        }
        
    } else {
        $filtered_hotels = $hotels;
    }
