<?php
include_once __DIR__ . '/../database/db.php';
include_once __DIR__ . '/workout.php';
include_once __DIR__ . '/exercise.php';


class Join {
  public $id;
  public $workout_id;
  public $exercise_id;
  public function __construct($id, $workout_id, $exercise_id){
    $this->id = $id;
    $this->workout_id = $workout_id;
    $this->exercise_id = $exercise_id;
  }
}

class Joins {
  static function find(){
    $query = file_get_contents(__DIR__ . '/../database/sql/joins/find.sql');
    $result = pg_query($query);
    $joins = array();
    $current_join = null;
    while($data = pg_fetch_object($result)){
      $current_join = new Join(intval($data->id), intval($data->workout_id), intval($data->exercise_id));
      $joins[] = $current_join;
    }
    return $joins;
    // return $result;
  }
  static function create($join){
    $query = file_get_contents(__DIR__ . '/../database/sql/joins/create.sql');
    $result = pg_query_params($query, array($join->workout_id, $join->exercise_id));
    return self::find();
  }
  static function delete($id){
    $query = file_get_contents(__DIR__ . '/../database/sql/joins/delete.sql');
    $result = pg_query_params($query, array($id));
    return self::find();
  }
  static function update($id, $updatedJoin){
    $query = file_get_contents(__DIR__ . '/../database/sql/joins/update.sql');
    $result = pg_query_params($query, array($updatedJoin->workout_id, $updatedJoin->exercise_id, $id));
    return self::find();
  }
}
?>
