<?php

header('Content-Type: application/json');
// die('test - line 3');
include_once __DIR__ . '/../models/exercise.php';

echo json_encode(Exercises::find());

?>
