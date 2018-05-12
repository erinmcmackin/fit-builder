<!DOCTYPE html>
<html lang="en" ng-app="FitBuilder">
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <script src="public/js/app.js" type="text/javascript"></script>
    <link rel="stylesheet" href="public/style/style.css">
    <link href="https://fonts.googleapis.com/css?family=Hind+Siliguri|Poiret+One" rel="stylesheet">
    <title>Fit Builder</title>
  </head>
  <body ng-controller="FitBuilder as ctrl">
    <div ng-include="'./public/partials/header-nav.html'"></div>
    <div ng-include="ctrl.includePath"></div>
    <div ng-include="'./public/partials/footer.html'"></div>
  </body>
</html>
