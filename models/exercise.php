<?php
Class Exercise {
    public $title;
    static public function create($title, $intensity, $focus, $description){
        //connect just once, not for every create/find
        //put these in a properties file that gets ignored from git
        $servername = 'localhost';
        $username = 'erin';
        $password = 'doon';
        $dbname = 'fit_builder';

        $pdo = new PDO('mysql:host=localhost;port=8888;dbname=fit_builder', $username, $password);

        if($pdo->connect_error){
            die('Connection Failed: ' . $pdo->connect_error);
        } else {
            $mysql = "INSERT INTO exercises (title, intensity, focus, description, image) VALUES ('".$title"', '.$intensity', '"$.focus"', '"$.description"', '"$.image"');";
            $pdo->query($mysql);
        }
        $pdo->close();
    }

    static public function find(){
         //connect just once, not for every create/find
        $servername = 'localhost';
        $username = 'root';
        $password = 'root';
        $dbname = 'fit_builder';

        $pdo = new PDO('mysql:host=localhost;port=8888;dbname=fit_builder', $username, $password);

        if($pdo->connect_error){
            $pdo->close();
            die('Connection Failed: ' . $pdo->connect_error);
        } else {
            $mysql = "SELECT * FROM exercises;";
            $results = $pdo->query($mysql);
            return $results;
        }
    }
}
