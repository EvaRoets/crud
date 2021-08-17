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

    public function create()
    {
        // TODO add correct values
        $sqlCreate = "INSERT INTO travel_list (activity, country, season, comments, done) VALUES ('value1', 'value2', 'value3','value4','value5');";
        $result = $this->databaseManager->connection->query($sqlCreate);
        return $result;
    }

    // Get one
    public function find()
    {

    }

    public function get()
    {
        // replace dummy data by real one
        $sql = "SELECT * FROM travel_list";
        $result = $this->databaseManager->connection->query($sql);
        return $result;
    }

    public function update()
    {

    }

    public function delete()
    {

    }

}