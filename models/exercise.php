<?php
include_once __DIR__ . '/../database/db.php';

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

class Exercises {
  static public function find(){
     //connect just once, not for every create/find
    // $servername = 'localhost';
    // $username = 'root';
    // $password = 'root';
    // $dbname = 'fit_builder';
    //
    // $mysql_connection = new mysqli($servername, $username, $password, $dbname);
    //
    // if($mysql_connection->connect_error){
    //   $mysql_connection->close();
    //   die('Connection Failed: ' . $mysql_connection->connect_error);
    // } else {
    //   $sql = "SELECT * FROM exercises;";
    //   $results = $mysql_connection->query($sql);
    //   return $results;
    // }
    $conn = pg_connect("dbname=fit_builder");
    $query = file_get_contents(__DIR__ . '/../database/sql/exercises/find.sql');
    $result = pg_query($conn, $query);
    $exercises = array();
    $current_exercise = null;
    while($data = pg_fetch_object($result)){
      // if($current_exercise === null){
        $current_exercise = new Exercise(intval($data->id), $data->title, intval($data->intensity), $data->focus, $data->description, $data->image);
        $exercises[] = $current_exercise;
      // }
    }
    return $exercises;
  }

//   static public function create($title, $intensity, $focus, $description, $image){
//     //connect just once, not for every create/find
//     //put these in a properties file that gets ignored from git
//   //   $servername = 'localhost';
//   //   $username = 'root';
//   //   $password = 'root';
//   //   $dbname = 'fit_builder';
//   //
//   //   $mysql_connection = new mysqli($servername, $username, $password, $dbname);
//   //
//   //   if($mysql_connection->connect_error){
//   //     die('Connection Failed: ' . $mysql_connection->connect_error);
//   //   } else {
//   //     $sql = "INSERT INTO exercises (title, intensity, focus, description, image) VALUES ('".$title."', '".$intensity."', '".$focus."', '".$description."', '".$image."');";
//   //     $mysql_connection->query($sql);
//   //   }
//   //   $mysql_connection->close();
//   // }
}


?>
