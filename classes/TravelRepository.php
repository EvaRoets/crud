<?php

// This class deals with queries for one type of data, allowing for easier reusage and retrieving all your queries. This technique is called the repository pattern.
class TravelRepository
{
    private $databaseManager;

    // This class needs a database connection to function
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;

    }

    function validateFields()
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


    public function create(string $activity, string $country, string $season, string $comments, string $done) :void
    {

        // check if required fields are filled out
        if (isset($_POST['addTravelGoal']) && !empty($_POST['activity']) && !empty($_POST['country']) && !empty($_POST['done'])) {
            $activity = $_POST['activity'];
            $country = $_POST['country'];
            $season = $_POST['season'];
            $comments = $_POST['comments'];
            $done = $_POST['done'];

            // TODO add correct checkbox values
            $sqlCreate = "INSERT INTO travel_list (activity, country, season, comments, done) VALUES ('$activity','$country','$season','$comments','$done');";
            $result = $this->databaseManager->connection->query($sqlCreate);

            //TODO remove test echo
            echo "Your travel goal has been added!";

//            return [
//                "result" => $result,
//                "message" => "<div class='alert alert-success'>" . $travels->confirmationMsg() . "</div>"
//            ];

        } else {
            $invalidFields = validateFields();
            if (!empty($invalidFields)) {
                if (in_array("activity", $invalidFields)) {
                    $errorMsg = "Whoops! Please fill out the activity you want to do.";
                    $errorMsg .= "<br>";
                }
                if (in_array("country", $invalidFields)) {
                    $errorMsg .= "Whoops! Please select a country.";
                    $errorMsg .= "<br>";
                }
                //TODO verify how to check for unchecked or double checked boxes
                if (in_array("done", $invalidFields)) {
                    $errorMsg .= "Whoops! Please check one of the boxes.";
                    $errorMsg .= "<br>";
                }

                //TODO remove test echo
                echo "Please fill out the required fields"
                // Display any empty or invalid data with corresponding error message
//                return [
//                    "travel" => null,
//                    "message" => "<div class='alert alert-danger'>" . $errorMsg . "</div>"
//                ];
            }
        }
    }


    // Get one
    public function find()
    {

    }

    public function get() : array
    {
        $sql = "SELECT * FROM travel_list";
        $output = $this->databaseManager->connection->query($sql);
        $result = $output->fetchAll();
        return $result;
    }

    public function update(string $changeActivity, string $changeCountry, string $changeSeason, string $changeComments, string $changeDone)
    {
        $changeActivity = $_POST['changeActivity'];
        $changeCountry = $_POST['changeCountry'];
        $changeSeason = $_POST['changeSeason'];
        $changeComments = $_POST['changeComments'];
        $changeDone = $_POST['changeDone'];


        $sqlChange = "UPDATE travel_list SET activity = value1, country = value2, season = value3, comments = value4, done = value5 WHERE condition;";
        $result = $this->databaseManager->connection->query($sqlChange);
        return $result;
    }

    public function delete()
    {
        $sqlDelete = "DELETE FROM travel_list WHERE id = '';";
        $result = $this->databaseManager->connection->query($sqlDelete);
        return $result;
    }

}

