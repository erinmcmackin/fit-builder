const app = angular.module('FitBuilder', []);

app.controller('FitBuilder', ['$http', function($http){

  // the welcome page shows on load
  this.includePath = './public/partials/welcome/welcome.html';
  this.exercise = '';
  this.workout = '';
  this.workoutExercises = [];
  this.showAddExercise = false;

  // =============
  // PATH INCLUDE
  // =============
  // changes which partial is shown on the page
  this.changeInclude = (path)=>{
    if(path === 'exercises/index'){
      this.getExercises();
      this.includePath = './public/partials/exercises/index.html'
    } else {
      this.includePath = './public/partials/' + path + '.html'
    }
  }

  // =============
  // EXERCISES
  // =============

  this.getExercises = ()=>{
    $http({
      method: 'GET',
      url: '/exercises'
    }).then((response)=>{
      this.exercises = response.data;
    }, (error)=>{
      console.log(error);
    }); // closes $http
  }; // closes getExercises

  this.openExerciseCreate = ()=>{
    this.includePath = './public/partials/exercises/create.html';
  }

  this.createExercise = ()=>{
    $http(
      {
        method: 'POST',
        url: '/exercises',
        data: {
          title: this.title,
          intensity: this.intensity,
          focus: this.focus,
          description: this.description,
          image: this.image
        }
      }
    ).then((response)=>{
      this.getExercises();
      this.includePath = './public/partials/exercises/index.html'
    }), (error)=>{error}
  }; // closes createExercise

  this.getShowExercise = (exercise)=>{
    this.exercise = exercise;
    $http({
      method: 'GET',
      url: 'exercises/' + exercise.id
    }).then((response)=>{
      this.exercise = response.data;
      this.includePath = './public/partials/exercises/show.html'
    }, (error)=>{
      console.log(error);
    }); // closes $http
  } // closes getShowExercise

  this.deleteExercise = (exercise)=>{
    $http({
      method: 'DELETE',
      url: 'exercises/' + exercise.id
    }).then((response)=>{
      this.exercise = response.data;
      this.getExercises();
      this.includePath = './public/partials/exercises/index.html';
    }, (error)=>{
      console.log(error);
    }); // closes $http
  }

  this.openExerciseEdit = ()=>{
    this.includePath = './public/partials/exercises/edit.html';
  }

  this.editExercise = (exercise)=>{
    $http(
      {
        method: 'PUT',
        url: 'exercises/' + exercise.id,
        data: {
          title: this.updatedTitle,
          intensity: this.updatedIntensity,
          focus: this.updatedFocus,
          description: this.updatedDescription,
          image: this.updatedImage
        }
      }
    ).then((response)=>{
      this.getShowExercise(this.exercise);
    }), (error)=>{error}
  }

  // =============
  // WORKOUTS
  // =============

  this.getWorkouts = ()=>{
    $http({
      method: 'GET',
      url: '/workouts'
    }).then((response)=>{
      this.workouts = response.data;
    }, (error)=>{
      console.log(error);
    }); // closes $http
  }; // closes getWorkouts

  this.openWorkoutCreate = ()=>{
    this.includePath = './public/partials/workouts/create.html';
  }

  this.createWorkout = ()=>{
    $http(
      {
        method: 'POST',
        url: '/workouts',
        data: {
          title: this.title,
          intensity: this.intensity,
          focus: this.focus,
          description: this.description,
          image: this.image,
          exercises: this.exercises
        }
      }
    ).then((response)=>{
      this.getWorkouts();
      this.includePath = './public/partials/workouts/index.html'
    }), (error)=>{error}
  }; // closes createWorkout

  this.getShowWorkout = (workout)=>{
    this.workout = workout;
    $http({
      method: 'GET',
      url: 'workouts/' + workout.id
    }).then((response)=>{
      this.workout = response.data;
      this.workoutExercises = response.data.exercises;
      this.includePath = './public/partials/workouts/show.html'
    }, (error)=>{
      console.log(error);
    }); // closes $http
  } // closes getShowWorkout

  this.deleteWorkout = (workout)=>{
    $http({
      method: 'DELETE',
      url: 'workouts/' + workout.id
    }).then((response)=>{
      this.workout = response.data;
      this.getWorkouts();
      this.includePath = './public/partials/workouts/index.html';
    }, (error)=>{
      console.log(error);
    }); // closes $http
  }

  this.openWorkoutEdit = ()=>{
    this.includePath = './public/partials/workouts/edit.html';
  }

  this.editWorkout = (workout)=>{
    $http(
      {
        method: 'PUT',
        url: 'workouts/' + workout.id,
        data: {
          title: this.updatedTitle,
          intensity: this.updatedIntensity,
          focus: this.updatedFocus,
          description: this.updatedDescription,
          image: this.updatedImage,
          exercises: this.updatedExercises
        }
      }
    ).then((response)=>{
      this.getShowWorkout(this.workout);
    }), (error)=>{console.log(error)}
  }

  // =============
  // JOINS
  // =============

  this.openAddExerciseToWorkout = (workout)=>{
    this.getExercises();
    this.showAddExercise = true;
  }

  this.addExerciseToWorkout = (exercise)=>{
    console.log(exercise);
    this.exercise = exercise;
    $http(
      {
        method: 'POST',
        url: '/joins',
        data: {
          workout_id: this.workout.id,
          exercise_id: this.exercise.id
        }
      }
    ).then((response)=>{
      this.getShowWorkout(this.workout);
    }), (error)=>{error}
  }

  // =============
  // ON LOADS
  // =============

  this.getExercises();
  this.getWorkouts();

}]); // closes the app.controller
