<?php

$dbconn = null;
if(getenv('DATABASE_URL')){
    $connectionConfig = parse_url(getenv('DATABASE_URL'));
    $host = $connectionConfig['host'];
    $user = $connectionConfig['user'];
    $password = $connectionConfig['pass'];
    $port = $connectionConfig['port'];
    $dbname = trim($connectionConfig['path'],'/');
    $dbconn = pg_connect(
        "host=".$host." ".
        "user=".$user." ".
        "password=".$password." ".
        "port=".$port." ".
        "dbname=".$dbname
    );
} else {
    $dbconn = pg_connect("host=localhost dbname=fit_builder");
}

class Exercise {
    public $id;
    public $title;
    public $intensity;
    public $focus;
    public $description;
    public $image;
    public function __construct($id, $title, $intensity, $focus, $description, $image) {
        $this->id = $id;
        $this->title = $title;
        $this->intensity = $intensity;
        $this->focus = $focus;
        $this->description = $description;
        $this->image = $image;
    }
}

Class Exercises {
    public $title;
    static public function create($title, $intensity, $focus, $description){
        //connect just once, not for every create/find
        //put these in a properties file that gets ignored from git
        $servername = 'localhost';
        $username = 'root';
        $password = 'root';
        $dbname = 'fit_builder';

        $mysql_connection = new mysqli($servername, $username, $password, $dbname);

        if($mysql_connection->connect_error){
            die('Connection Failed: ' . $mysql_connection->connect_error);
        } else {
            $sql = "INSERT INTO exercises (title, intensity, focus, description, image) VALUES ('".$title."', '".$intensity."', '".$focus."', '".$description."', '".$image."');";
            $mysql_connection->query($sql);
        }
        $mysql_connection->close();
    }

    static public function find(){
         //connect just once, not for every create/find
        $servername = 'localhost';
        $username = 'root';
        $password = 'root';
        $dbname = 'fit_builder';

        $mysql_connection = new mysqli($servername, $username, $password, $dbname);

        if($mysql_connection->connect_error){
            $mysql_connection->close();
            die('Connection Failed: ' . $mysql_connection->connect_error);
        } else {
            $sql = "SELECT * FROM exercises;";
            $results = $mysql_connection->query($sql);
            return $results;
        }
    }
}


?>
