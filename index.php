<?php

// Require the correct variable type to be used (no auto-converting)
declare (strict_types=1);

// Show errors so we get helpful information
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

function whatIsHappening()
{
    var_dump("<pre>");
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
    echo '<h2>$_SERVER</h2>';
    var_dump($_SERVER["REQUEST_URI"]);
    var_dump("</pre>");
}

whatIsHappening();

// Load you classes
require_once 'config.php';
require_once 'classes/DatabaseManager.php';
require_once 'classes/TravelRepository.php';

$databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password'], $config['dbname']);
$databaseManager->connect();

$travelRepository = new TravelRepository($databaseManager);
$newTravelGoal = $travelRepository->create();
$travels = $travelRepository->get();













// Load your view
// Tip: you can load this dynamically and based on a variable, if you want to load another view
require 'overview.php';