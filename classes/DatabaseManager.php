<?php

// This class will manage the connection to the database
class DatabaseManager
{
    // These variables are private: only this class needs them
    private $host;
    private $user;
    private $password;
    private $dbname;

    // This variable is public, so we can use it outside of this class
    public $connection;

    public function __construct(string $host, string $user, string $password, string $dbname)
    {
        // Set any user and password information
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    public function connect() : PDO
    {
        // make the connection to the database
        // servername, database name
        $dsn = 'mysql:host=' . $this->host . ';dbname='. $this->dbname;

        // username and password
        $this->connection = new PDO($dsn, $this->user, $this->password);

        // set default connection settings: by default attribute is set to fetch, and return in an associative array
        $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $this->connection;
    }
}