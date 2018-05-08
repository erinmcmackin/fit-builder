const app = angular.module('FitBuilder', []);

app.controller('FitBuilder', ['$http', function($http){

  // the welcome page shows on load
  this.includePath = './public/partials/welcome/welcome.html';
  this.exercise = '';

  // =============
  // Path Include
  // =============
  // changes which partial is shown on the page
  this.changeInclude = (path)=>{
    this.includePath = './public/partials/' + path + '.html'
  }

  // =============
  // Exercises
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
    this.includePath = './public/partials/exercises/create.html'
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
      console.log(response);
      this.getExercises();
      this.includePath = './public/partials/exercises/index.html'
    }), (error)=>{error}
  }; // closes createExercise

  this.getShowExercise = (exercise)=>{
    $http({
      method: 'GET',
      url: 'exercises/' + exercise.id
    }).then((response)=>{
      this.exercise = response.data;
      console.log(this.exercise);
      this.includePath = './public/partials/exercises/show.html'
    }, (error)=>{
      console.log(error);
    }); // closes $http
  } // closes getShowExercise

  this.deleteExercise = (exercise)=>{
    console.log(exercise);
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

  this.getExercises();

}]); // closes the app.controller
