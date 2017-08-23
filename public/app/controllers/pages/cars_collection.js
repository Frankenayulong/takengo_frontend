app.controller('carsCollectionController', ['$scope', '$rootScope', '$http', 'ENV', '$location', function($scope, $rootScope, $http, ENV, $location){
    console.log('Going to Cars Collection Page')
    let params = $location.search();
    let page = 1;
    if (params.hasOwnProperty('page') && !isNaN(params.page)){
        page = params.page
    }
    console.log("RETRIEVED PARAMS", params);
    $scope.cars = [];
    $scope.carsCollectionCtrl = {
        loading:{
            retrieve: true
        },
        error: {
            retrieve: false,
            message: {
                retrieve: []
            }
        },
        current_page: page,
        last_page: -1
    }
    $scope.retrieve = () => {
        var parsedParams = parseParams();
        $scope.carsCollectionCtrl.loading.retrieve = true;
        $http.get(ENV.API_URL + 'cars?' + parsedParams)
        .then((data)=>{
            console.log(data.data); 
            let response = data.data;
            $scope.cars = response.data;
            $scope.carsCollectionCtrl.last_page = response.last_page;
            $scope.carsCollectionCtrl.current_page = response.current_page;
            $scope.carsCollectionCtrl.loading.retrieve = false;
            if($scope.carsCollectionCtrl.last_page < $scope.carsCollectionCtrl.current_page){
                $scope.carsCollectionCtrl.current_page = $scope.carsCollectionCtrl.last_page;
                $location.search('page', $scope.carsCollectionCtrl.last_page)
                $scope.retrieve()
            }
            $scope.digest();
        }, (data)=>{
            console.log9data
            let response = data.data;
            $scope.carsCollectionCtrl.error.retrieve = true;
            $scope.carsCollectionCtrl.error.message.retrieve = ['Error fetching cars'];
            $scope.carsCollectionCtrl.loading.retrieve = false;
            $scope.digest();
        });
    }

    var parseParams = () => {
        var p = "";
        if($scope.carsCollectionCtrl.current_page > 1){
            p += ("page=" + $scope.carsCollectionCtrl.current_page)
        }
        return p;
    }
    
    $scope.retrieve();
}]);