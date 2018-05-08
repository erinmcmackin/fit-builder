const app = angular.module('FitBuilder', []);

app.controller('FitBuilder', ['$http', function($http){

  // the welcome page shows on load
  this.includePath = './public/partials/welcome.html'
  // './public/partials/welcome.html'

  // =============
  // Path Include
  // =============
  // changes which partial is shown on the page
  this.changeInclude = (path)=>{
    this.includePath = 'partials/' + path + '.html'
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

  // this.createExercise = ()=>{
  //   $http(
  //     {
  //       method: 'POST',
  //       url: '/exercises',
  //       data: {
  //         title: this.title,
  //         intensity: this.intensity,
  //         focus: this.focus,
  //         description: this.description,
  //         image: this.image
  //       }
  //     }
  //   ).then((response)=>{
  //     console.log(response);
  //   }), (error)=>{error}
  // }; // closes createExercise

  this.getExercises();

}]); // closes the app.controller
