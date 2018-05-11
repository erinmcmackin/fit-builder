<?php
header('Content-Type: application/json');
include_once __DIR__ . '/../models/join.php';

if($_REQUEST['action'] === 'index'){
  echo json_encode(Joins::find());
} else if ($_REQUEST['action'] === 'post'){
  $requestBody = file_get_contents('php://input');
  $body = json_decode($requestBody);
  $newJoin = new Join(null, $body->workout_id, $body->exercise_id);
  $allJoins = Joins::create($newJoin);
  echo json_encode($allJoins);
} else if ($_REQUEST['action'] === 'delete'){
  $allJoins = Joins::delete($_REQUEST['id']);
  echo json_encode($allJoins);
} else if ($_REQUEST['action'] === 'update'){
  $requestBody = file_get_contents('php://input');
  $body = json_decode($requestBody);
  $updatedJoin = new Join(null, $body->workout_id, $body->exercise_id);
  $allJoins = Joins::update($_REQUEST['id'], $updatedJoin);
  echo json_encode($allJoins);
}
?>
