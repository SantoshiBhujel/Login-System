<?php
require_once'database.php';
    class UserModel
    {
        function login($username, $password){
            $database=new Database();
            $parameters=[               //prepare statement or parameterized 
            'username'=>$username,
            'password'=>$password
            ];

            $sql ="select * from users where username= :username and password=md5(:password)";
            
            $rows= $database->fetchAll($sql, $parameters);
            return count($rows) >0;
        }
        
        function insert($username, $password){
            $database=new Database();
            $parameters=[               //prepare statement or parameterized 
            'username'=>$username,
            'password'=>$password
            ];

            $sql ='insert into users(username, password) values(:username,md5(:password))';
            return $database->execute($sql,$parameters);
        }
    }