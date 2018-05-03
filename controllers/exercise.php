<?php
header('Content-Type: application/json');
include_once __DIR__ . '/../models/exercise.php';

if($_REQUEST['action'] === 'index'){
    echo json_encode(Exercises::find());
} else if ($_REQUEST['action'] === 'post'){
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
}
?>
