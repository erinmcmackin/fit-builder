<?php

header('Content-Type: application/json');
include_once __DIR__ . '/../models/workout.php';

if($_REQUEST['action'] === 'index'){
  echo json_encode(Workouts::find());
} else if ($_REQUEST['action'] === 'post'){
  $requestBody = file_get_contents('php://input');
  $body = json_decode($requestBody);

  // $newWorkout = new Workout(null, $body->title, $body->intensity, $body->focus, $body->description, $body->image, $body->exercises);
  $newWorkout = new Workout(null, $body->title, $body->intensity, $body->focus, $body->description, $body->image);

  $allWorkouts = Workouts::create($newWorkout);

  echo json_encode($allWorkouts);
} else if ($_REQUEST['action'] === 'delete'){
  $allWorkouts = Workouts::delete($_REQUEST['id']);
  echo json_encode($allWorkouts);
} else if ($_REQUEST['action'] === 'update'){
  $requestBody = file_get_contents('php://input');
  $body = json_decode($requestBody);
  // $updatedWorkout = new Workout(null, $body->title, $body->intensity, $body->focus, $body->description, $body->image, $body->exercises);
  $updatedWorkout = new Workout(null, $body->title, $body->intensity, $body->focus, $body->description, $body->image);
  $allWorkouts = Workouts::update($_REQUEST['id'], $updatedWorkout);

  echo json_encode($allWorkouts);
} else if ($_REQUEST['action'] === 'new'){
  echo json_encode(Workouts::findShow($_REQUEST['id']));
}
?>
