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
$travels = $travelRepository->get();

function validateForm()
{
    // Create and return invalid fields array
    $invalidFields = [];
    if (empty($_POST["activity"])) {
        array_push($invalidFields, "activity");
    }
    if (empty($_POST["country"])) {
        array_push($invalidFields, "country");
    }
    if (empty($_POST["done"]) && empty($_POST["not done"])) {
        array_push($invalidFields, "done");
    }
    return $invalidFields;
}

//TODO add parameters
function handleForm()
{
    $invalidFields = validateForm();
    if (!empty($invalidFields)) {
        if (in_array("activity", $invalidFields)) {
            $errorMsg = "Please fill out the activity you want to do";
            $errorMsg .= "<br>";
        }
        if (in_array("country", $invalidFields)) {
            $errorMsg .= "Please select a country.";
            $errorMsg .= "<br>";
        }
        //TODO verify how to check for unchecked or double checked boxes
        if (in_array("done", $invalidFields)) {
            $errorMsg .= "Please check one of the boxes.";
            $errorMsg .= "<br>";
        }
        // Display any empty or invalid data with corresponding error message
        return [
            "travel" => null,
            "message" => "<div class='alert alert-danger'>" . $errorMsg . "</div>"
        ];

    } elseif (empty($invalidFields)) {
        // Loop through checkboxes


        // Save data
        $travel = new TravelRepository ($_POST["activity"], $_POST["country"], $_POST["season"], $_POST["comments"], $orderedProducts);

        // Save data in session on submit to keep it displayed after error message
        $_SESSION["activity"] = $travel->get();
        $_SESSION["country"] = $travel->create();
        $_SESSION["season"] = $travel;
        $_SESSION["comments"] = "";
        $_SESSION["done"] = "";

        // Return fields
        return [
            "travel" => $travel,
            "message" => "<div class='alert alert-success'>" . $travel->confirmationMsg() . "</div>",
        ];
    }
}


// Load your view
// Tip: you can load this dynamically and based on a variable, if you want to load another view
require 'overview.php';