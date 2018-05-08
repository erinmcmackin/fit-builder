<?php
// die('test - 1');
header('Content-Type: application/json');
// die('test - line 3');
include_once __DIR__ . '/../models/exercise.php';

// die('test - line 4');
if($_REQUEST['action'] === 'index'){
  echo json_encode(Exercises::find());
} else if ($_REQUEST['action'] === 'create'){
  $requestBody = file_get_contents('php://input');
  $body = json_decode($requestBody);

  $newExercise = new Exercise(null, $body->title, $body->intensity, $body->focus, $body->description, $body->image);

  $allExercises = Exercises::create($newExercise);

  echo json_encode($allExercises);
} else if ($_REQUEST['action'] === 'delete'){
  $allExercises = Exercises::delete($_REQUEST['id']);
  echo json_encode($allExercises);
} else if ($_REQUEST['action'] === 'update'){
  $requestBody = file_get_contents('php://input');
  $body = json_decode($requestBody);
  $updatedExercise = new Exercise(null, $body->title, $body->intensity, $body->focus, $body->description, $body->image);
  $allExercises = Exercises::update($_REQUEST['id'], $updatedExercise);

  echo json_encode($allExercises);
} else if ($_REQUEST['action'] === 'new'){
  echo json_encode(Exercises::findShow($_REQUEST['id']));
}
?>
