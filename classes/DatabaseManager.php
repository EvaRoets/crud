<?php

class DatabaseManager
{
    private $host;
    private $user;
    private $password;
    private $dbname;

    public $connection;

    public function __construct(string $host, string $user, string $password, string $dbname)
    {
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