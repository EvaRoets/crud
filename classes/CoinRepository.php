<?php

// This class deals with queries for one type of data, allowing for easier reusage and retrieving all your queries. This technique is called the repository pattern.
class CoinRepository
{
    private $databaseManager;

    // This class needs a database connection to function
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }

    public function create()
    {

    }

    // Get one
    public function find()
    {

    }

    // Get all
    public function get()
    {
        // replace dummy data by real one
        // We get the database connection first, so we can apply our queries with it
        $sql = "SELECT * FROM coins";
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