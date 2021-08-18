<?php

// Require the correct variable type to be used (no auto-converting)
declare (strict_types=1);

// Show errors so we get helpful information
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Load you classes
require_once 'config.php';
require_once 'classes/DatabaseManager.php';
require_once 'classes/TravelRepository.php';

$databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password'], $config['dbname']);
$databaseManager->connect();


$travelRepository = new TravelRepository($databaseManager);

if (isset($_POST['addTravelGoal'])) {
    $newTravelGoal = $travelRepository->create("$activity", "$country", "$season", "$comments",  "$done");
}
if (isset($_POST['changeTravelGoal'])) {
    $changeTravelGoal = $travelRepository->update("$changeActivity", "$changeCountry", "changeSeason", "changeComments", "changeDone");
}
if (isset($_POST['deleteTravelGoal'])) {
    $deleteTravelGoal = $travelRepository->delete();
}

$travels = $travelRepository->get();


// Load your view
// Tip: you can load this dynamically and based on a variable, if you want to load another view
require 'overview.php';