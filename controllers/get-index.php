<?php
header('Content-Type: application/json');
include_once __DIR__ . '/../models/exercise.php';
echo json_encode(Exercises::find());
?>
