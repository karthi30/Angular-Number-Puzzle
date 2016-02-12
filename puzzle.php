<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Puzzle</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/angular.js"></script>
    <script src="js/ngDraggable.js"></script>
</head>

<body ng-app="puzApp">
    <div class="container" ng-controller="puzCtrl">
        <div class="row">
        </div>
        <h2 class="text-center">Make 20 in all grey boxes by drag values from right side</h1>
        <hr>
        <div class="col-md-9">
           <div class="dropp col-md-10">
            <div ng-repeat="i in horizontal">
               <div ng-repeat="j in vertical">
                   <div ng-drop="true" ng-horizontal="i" ng-vertical="j" ng-model="drp[i][j]" ng-drop-success="onDropComplete($data,$event,$target,$i,$j)" ng-class="horArr[i] == 20 || verArr[j] == 20? 'green' : 'white'">{{drp[i][j]}} </div>
               </div>
                
            </div>
            </div>
            <div class="col-md-2">
            <div ng-repeat="h in horizontal">
                <div class="hresult" ng-class="horArr[h] == 20 ? 'green' : 'grey'">{{horArr[h]}}  
                </div>
            </div>
            </div>
            <div class="col-md-12">
            <div ng-repeat="v in vertical">
                <div class="vresult" ng-class="verArr[v] == 20 ? 'green' : 'grey'">{{verArr[v]}}  
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-3">
            <ul class="draggable-objects">
                <li ng-repeat="obj in draggable">
                    <div ng-drag="true" ng-drag-data="obj" ng-drag-success="onDragComplete($data,$event)"> {{obj}} </div>
                </li>
            </ul>
        </div>

    </div>

    <script>
        var app = angular.module('puzApp', ['ngDraggable']);
        app.controller('puzCtrl', function($scope) {
            $scope.horizontal = [0,1,2,3];
            $scope.vertical = [0,1,2,3];
            $scope.drp = [[],[],[],[]];
            for(var i=0;i<4;i++){for(var j=0;j<4;j++){$scope.drp[i][j]=0}};
            $scope.draggable = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20];
            $scope.horArr = []
            $scope.verArr = []
            $scope.onDropComplete = function(data, evt,target,i,j) { 
            $scope.drp[i][j] = data;
                $scope.horArr[i]=0;
                for(p=0;p<4;p++){
                    $scope.horArr[i] +=parseInt($scope.drp[i][p]);
                    console.log($scope.horArr[i]);
                }
                $scope.verArr[j]=0
                for(q=0;q<4;q++){
                    $scope.verArr[j] += parseInt($scope.drp[q][j])
                }
            }
        });
    </script>
</body>

</html>