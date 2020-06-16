<?php


class database
{
    private $connection;
    private static $instance;
    private $host = '127.0.0.1';
    private $username = 'root';
    private $password = '';
    private $database = 'quantixon';

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct()
    {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
        $this->connection->set_charset("utf8");

        if (mysqli_connect_error()) {
            trigger_error("Failed connect to MySQL: " . mysqli_connect_error(), E_USER_ERROR);
        }
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public function getConnection()
    {
        return $this->connection;
    }
}