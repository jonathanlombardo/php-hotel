<?php
require_once __DIR__ . "/vars.php";

$max_dist = 0;

foreach ($hotels as $hotel) {
  $dist = $hotel["distance_to_center"];
  if ($dist > $max_dist) {
    $max_dist = $dist;
  }
}

$max_dist = number_format($max_dist, 1);
// var_dump($max_dist);

$min_dist = $max_dist;

foreach ($hotels as $hotel) {
  $dist = $hotel["distance_to_center"];
  if ($dist < $min_dist) {
    $min_dist = $dist;
  }
}

$min_dist = number_format($min_dist, 1);
// var_dump($min_dist);

$name_filter_init = '';
$park_filter_init = false;
$vote_filter_init = 0;
$dist_filter_init = $max_dist;

$name_filter = $_GET["hotel-name"] ?? $name_filter_init;
$park_filter = isset($_GET["parking-check"]) ? true : $park_filter_init;
$vote_filter = $_GET["vote-range"] ?? $vote_filter_init;
$dist_filter = $_GET["dist-range"] ?? $dist_filter_init;

$form_sent = !empty($_GET);

if ($form_sent) {

  $filtered_hotels = [];

  foreach ($hotels as $hotel) {

    if (
      str_contains(strtolower($hotel["name"]), strtolower(trim($name_filter))) &&
      ($park_filter ? $hotel["parking"] : true) &&
      $hotel["vote"] >= $vote_filter &&
      $hotel["distance_to_center"] <= $dist_filter
    ) {
      $filtered_hotels[] = $hotel;
    }
  }

} else {
  $filtered_hotels = $hotels;
}
