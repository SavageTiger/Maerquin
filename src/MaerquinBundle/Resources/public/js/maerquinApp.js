
var maerquinApp = angular.module("maerquinApp", []);

maerquinApp.controller("menuCtrl", function ($scope, $rootScope) {

    $scope.list = function (modelType, label) {
        $rootScope.viewType  = 'list';
        $rootScope.modelType = modelType;
        $rootScope.label     = label;
    }

});

maerquinApp.controller("viewCtrl", function ($scope, $http) {

    var getList = function () {
        $http.get(window.ENV.apiURL + $scope.modelType + '/list').then(function (response) {
            $scope.modelList = response.data;
        });
    };

    $scope.viewItem = function(itemId) {
        $http.get(window.ENV.apiURL + $scope.modelType + '/' + itemId + '/view').then(function (response) {
            $scope.recordView = response.data;
        });
    };

    $scope.$watch('viewType', function (oldVal, newVal) {

        if (newVal === 'list') {
            getList();
        }

    });

});

maerquinApp.directive('ngAutoSize', function() {
    return {
        link: function(scope, element, attrs) {
            var dom    = element.get(0).ownerDocument;
                window = dom.defaultView || dom.parentWindow;

            angular.element(window).off('resize');
            angular.element(window).on('resize', function (e) {
                scope.autoHeight = (window.innerHeight - 190) + 'px';

                if (!e.isTrigger) {
                    scope.$digest();
                }
            });
            angular.element(window).trigger('resize');
        }
    };
});

maerquinApp.directive('rnCompile', function($compile) {
    return function(scope, element, attrs) {
        scope.$watch(
            function (scope) {
                return scope.$eval(attrs.rnCompile);
            },
            function (value) {
                element.html(value);

                $compile(element.contents())(scope);
            }
        );
    }
});
