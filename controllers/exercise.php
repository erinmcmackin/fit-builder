<?php
require('../models/exercise.php');
Class ExerciseController {
    public function indexPage(){
        $exercises = Exercise::find();
        require('../views/$exercises/index.php');
    }
    public function newPage(){
        require('../views/exercises/new.php');
    }
    public function createAction(){
        Exercise::create($_POST['title'], $_POST['intensity'], $_POST['focus'], $_POST['description'], $_POST['image']);
        header('Location: ./');
    }
}
$new_exercise_controller = new ExerciseController();
if($_GET['action']=='index'){
    $new_exercise_controller->indexPage();
} else if($_GET['action']=='new'){
    $new_exercise_controller->newPage();
} else if($_GET['action']=='create'){
    $new_exercise_controller->createAction();
}
