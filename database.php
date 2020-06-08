<?php

class Database{ //execute function banaune

    private $pdo;
    
    public function __construct(){
        $host='localhost';
        $db_name='loginsystem';
        $db_username='root';
        $db_password='';
        $options=array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );

        $this->pdo = new PDO("mysql:host=$host; dbname=$db_name", $db_username, $db_password, $options);
    }

    public function fetchAll ($sql, $parameters = NULL) {
        $statement=$this->pdo->prepare($sql); // cant be hack if done this way
        $statement->execute($parameters);
        //$statement=  $pdo->query($sql);
        return $statement->fetchAll();
    }

    public function execute ($sql, $parameters = NULL) {
        $statement=$this->pdo->prepare($sql); 
        $statement->execute($parameters);
        return $statement->rowCount(); 

    }

}