
var maerquinApp = angular.module("maerquinApp", []);

maerquinApp.controller("menuCtrl", function ($scope, $rootScope) {

    $scope.list = function (modelType, label) {
        $rootScope.viewType  = 'list';
        $rootScope.modelType = modelType;
        $rootScope.label     = label;
    }

});

maerquinApp.controller("viewCtrl", function ($scope, $http) {

    var getList = function (modelType, callback) {
        $http.get(window.ENV.apiURL + modelType + '/list').then(callback);
    };

    $scope.$watch('viewType', function (oldVal, newVal) {

        if (newVal === 'list') {
            getList($scope.modelType, function(response) {
                console.log(response.data);
            })
        }

    });


});