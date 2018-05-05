<!DOCTYPE html>
<html lang="en" ng-app="FitBuilder">
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="public/js/app.js" type="text/javascript"></script>
    <link rel="stylesheet" href="public/style/style.css">
    <title>Fit Builder</title>
  </head>
  <body ng-controller="FitBuilder as ctrl">
    <h1>Hi {{2+2}}</h1>
    <div ng-include=" './public/partials/exercises/index.html' "></div>
  </body>
</html>
