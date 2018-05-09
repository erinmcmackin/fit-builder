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
    if(path === 'exercises/index'){
      this.getExercises();
      this.includePath = './public/partials/exercises/index.html'
    } else {
      this.includePath = './public/partials/' + path + '.html'
    }
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
    console.log(this.exercise.intensity);
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

  this.getExercises();

}]); // closes the app.controller
