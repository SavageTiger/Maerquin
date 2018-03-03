
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
                $scope.modelList =  response.data;
            })
        }

    });

});

maerquinApp.directive('ngAutoSize', function() {
    return {
        link: function(scope, element, attrs) {
            var dom    = element.get(0).ownerDocument;
                window = dom.defaultView || dom.parentWindow;

            angular.element(window).off('resize');
            angular.element(window).on('resize', function () {
                scope.autoHeight = (window.innerHeight - 190) + 'px';

                scope.$digest();
            });
            angular.element(window).trigger('resize');
            console.log(scope.autoHeight);
        }
    };
});