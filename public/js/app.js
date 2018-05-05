const app = angular.module('FitBuilder', []);

app.controller('FitBuilder', ['$http', function($http){

  // =============
  // Exercises
  // =============

  this.getExercises = ()=>{
    console.log('what is happening');
    $http({
      method: 'GET',
      url: '/models/exercise.php'
    }).then((response)=>{
      console.log(response);
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

}]); // closes the app.controller
