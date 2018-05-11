<?php
include_once __DIR__ . '/../database/db.php';
include_once __DIR__ . '/exercise.php';

class Workout {
  public $id;
  public $title;
  public $intensity;
  public $focus;
  public $description;
  public $image;
  // public $exercises;
  // public function __construct($id, $title, $intensity, $focus, $description, $image, $exercises) {
  public function __construct($id, $title, $intensity, $focus, $description, $image) {
    $this->id = $id;
    $this->title = $title;
    $this->intensity = $intensity;
    $this->focus = $focus;
    $this->description = $description;
    $this->image = $image;
    // if($exercises !== null){
    //   $this->exercises = $exercises;
    // }
  }
}

class Workouts {
  static function find(){
    // good practice to include $conn parameter to pg_query to prevent weird bugs
    // $conn = pg_connect("dbname=fit_builder");
    $query = file_get_contents(__DIR__ . '/../database/sql/workouts/find.sql');
    $result = pg_query($query);
    // $result = pg_query($conn, $query);
    $workouts = array();
    $current_workout = null;
    // while there are results in the data fetch, keep running this code
    while($data = pg_fetch_object($result)){
      // if($current_workout === null){
        // creating a new workout
        // $current_workout = new Workout(intval($data->id), $data->title, intval($data->intensity), $data->focus, $data->description, $data->image, $data->exercises);
        $current_workout = new Workout(intval($data->id), $data->title, intval($data->intensity), $data->focus, $data->description, $data->image);
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
    $workouts = array();
    // even though pulling just one workout, the while loop allows me to pull all exercises
    while($data = pg_fetch_object($result)){
      if($current_workout->id !== intval($data->workout_id)){
        $current_workout = new Workout(intval($data->workout_id), $data->workout_title, intval($data->workout_intensity), $data->workout_focus, $data->workout_description, $data->workout_image);
        $current_workout->exercises = [];
      }
      if($data->joins_id){
        $new_exercise = new Exercise(intval($data->exercise_ex_id), $data->exercise_title, intval($data->exercise_intensity), $data->exercise_focus, $data->exercise_description, $data->exercise_image);

        $current_workout->exercises[] = $new_exercise;
      }
    }
    return $current_workout;
    echo $result;
  }

  static function create($workout){
    $query = file_get_contents(__DIR__ . '/../database/sql/workouts/create.sql');
    // $result = pg_query_params($query, array($workout->title, intval($workout->intensity), $workout->focus, $workout->description, $workout->image, $workout->exercises));
    $result = pg_query_params($query, array($workout->title, intval($workout->intensity), $workout->focus, $workout->description, $workout->image));
    return self::find();
    // return $workout;
  }

  static function delete($id){
    $query = file_get_contents(__DIR__ . '/../database/sql/workouts/delete.sql');
    $result = pg_query_params($query, array($id));
    return self::find();
  }

  static function update($id, $updatedWorkout){
    $query = file_get_contents(__DIR__ . '/../database/sql/workouts/update.sql');
    // $result = pg_query_params($query, array($updatedWorkout->title, intval($updatedWorkout->intensity), $updatedWorkout->focus, $updatedWorkout->description, $updatedWorkout->image, $updatedWorkout->exercises, $id));
    $result = pg_query_params($query, array($updatedWorkout->title, intval($updatedWorkout->intensity), $updatedWorkout->focus, $updatedWorkout->description, $updatedWorkout->image, $id));
    return self::find();
  }

}


?>
