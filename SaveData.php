<?php

require_once "Database.php";

class SaveData
{
    private $username;
    private $email;
    private $phone;
    private $message;
    private $date;

    public function __construct($username, $email, $phone, $message)
    {
        $this->username = $username;
        $this->email = $email;
        $this->phone = $phone;
        $this->message = $message;
        $this->date = date('Y-m-d-H-i-s');
    }

    public function writeToFile()
    {
        $file = fopen("{$this->date}.txt", 'a+');
        fwrite($file, "Имя:" . $this->username . "\t" . "Емеил:" . $this->email . "\t" . "Телефон:" . $this->phone . "\t" . "Сообщение:" . $this->message . "\n");
        return 'Файл записан успешно';
    }

    public function writeToDB()
    {
        $db = Database::getInstance();
        $mysqli = $db->getConnection();
        $query = "INSERT INTO `messages` SET `username` = '{$this->username}',`email`='$this->email', `phone`='{$this->phone}',`message`='{$this->message}'";
        $mysqli->query($query);

    }

    public function checkName()
    {
        if (3 < strlen($this->username) && strlen($this->username) < 17) {
            return true;
        } else {
            return false;
        }
    }

    public function checkPhone()
    {
        if (ctype_digit($this->phone) && 10 === strlen($this->phone)) {
            return true;
        } else {
            return false;
        }
    }

    public function checkEmail()
    {
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    public function checkMessage()
    {
        if (!empty($this->message)) {
            return true;
        } else {
            return false;
        }
    }
}