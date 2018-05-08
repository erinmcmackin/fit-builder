const app = angular.module('FitBuilder', []);

app.controller('FitBuilder', ['$http', function($http){

  // the welcome page shows on load
  this.includePath = './public/partials/welcome/welcome.html';

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
      url: '/controllers/get-index.php'
    }).then((response)=>{
      this.exercises = response.data;
    }, (error)=>{
      console.log(error);
    }); // closes $http
  }; // closes getExercises

  // this.openExerciseShow = (exercise)=>{
  //
  // }

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

  this.getExercises();

}]); // closes the app.controller
