<?php
include_once __DIR__ . '/../database/db.php';

class Workout {
  public $id;
  public $title;
  public $intensity;
  public $focus;
  public $description;
  public $image;
  public $exercises;
  public function __construct($id, $title, $intensity, $focus, $description, $image, $exercises) {
    $this->id = $id;
    $this->title = $title;
    $this->intensity = $intensity;
    $this->focus = $focus;
    $this->description = $description;
    $this->image = $image;
    $this->exercises = $exercises;
  }
}

class Workouts {
  static function find(){
    // good practice to include $conn parameter to pg_query to prevent weird bugs
    $conn = pg_connect("dbname=fit_builder");
    // declaring the sql statement in a separate file
    $query = file_get_contents(__DIR__ . '/../database/sql/workouts/find.sql');
    $result = pg_query($conn, $query);
    $workouts = array();
    $current_workout = null;
    // while there are results in the data fetch, keep running this code
    while($data = pg_fetch_object($result)){
      // if($current_workout === null){
        // creating a new workout
        $current_workout = new Workout(intval($data->id), $data->title, intval($data->intensity), $data->focus, $data->description, $data->image, $data->exercises);
        $workouts[] = $current_workout;
      // }
    }
    return $workouts;
  }

  static function findShow($id){
    // declaring the sql statement in a separate file
    $query = file_get_contents(__DIR__ . '/../database/sql/workouts/show.sql');
    $result = pg_query_params($query, array($id));
    $current_workout = null;
    $data = pg_fetch_object($result);
    return $data;
  }

  static function create($workout){
    $query = file_get_contents(__DIR__ . '/../database/sql/workouts/create.sql');
    $result = pg_query_params($query, array($workout->title, intval($workout->intensity), $workout->focus, $workout->description, $workout->image, $workout->exercises));
    // return self::find();
    return $result;
  }

  static function delete($id){
    $query = file_get_contents(__DIR__ . '/../database/sql/workouts/delete.sql');
    $result = pg_query_params($query, array($id));
    return self::find();
  }

  static function update($id, $updatedWorkout){
    $query = file_get_contents(__DIR__ . '/../database/sql/workouts/update.sql');
    $result = pg_query_params($query, array($updatedWorkout->title, intval($updatedWorkout->intensity), $updatedWorkout->focus, $updatedWorkout->description, $updatedWorkout->image, $updatedWorkout->exercises, $id));
    return self::find();
  }

}


?>
