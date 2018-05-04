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
  static function find(){
    // good practice to include $conn parameter to pg_query to prevent weird bugs
    $conn = pg_connect("dbname=fit_builder");
    // declaring the sql statement in a separate file
    $query = file_get_contents(__DIR__ . '/../database/sql/exercises/find.sql');
    $result = pg_query($conn, $query);
    $exercises = array();
    $current_exercise = null;
    // while there are results in the data fetch, keep running this code
    while($data = pg_fetch_object($result)){
      // if($current_exercise === null){
        // creating a new exercise
        $current_exercise = new Exercise(intval($data->id), $data->title, intval($data->intensity), $data->focus, $data->description, $data->image);
        $exercises[] = $current_exercise;
      // }
    }
    return $exercises;
  }

  static function create($exercise){
    $query = file_get_contents(__DIR__ . '/../database/sql/exercises/create.sql');
    $result = pg_query_params($query, array($exercise->title, intval($exercise->intensity), $exercise->focus, $exercise->description, $exercise->image));

    return self::find();
  }

  static function delete($id){
    $query = file_get_contents(__DIR__ . '/../database/sql/exercises/delete.sql');
    $result = pg_query_params($query, array($id));
    return self::find();
  }

  static function update($id, $updatedExercise){
    $query = file_get_contents(__DIR__ . '/../database/sql/exercises/update.sql');
    $result = pg_query_params($query, array($updatedExercise->title, intval($updatedExercise->intensity), $updatedExercise->focus, $updatedExercise->description, $updatedExercise->image, $id));
    return self::find();
  }

}


?>
