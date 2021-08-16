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

    public function connect()
    {
        // TODO: make the connection to the database
        $this->connection = null;
    }
}