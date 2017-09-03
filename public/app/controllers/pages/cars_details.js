app.controller('carsDetailController', ['$scope', '$rootScope', '$http', 'ENV', '$location', 'NgMap', '$window', function($scope, $rootScope, $http, ENV, $location, NgMap, $window){
    $scope.gmap = {
        map: null
    };
    NgMap.getMap().then(function(map) {
        console.log(map)
        $scope.gmap.map = map;
    }).catch(err => {
        console.log(err)
    });

    $scope.book = (url = '') => {
        if(!$rootScope.metadata.signed_in || url == ''){
            $('#login-form').modal('show');
        }else{
            $window.location.href = url;
        }
    }
}]);