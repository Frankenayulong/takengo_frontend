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
        last_page: -1,
        api_url: ENV.API_URL
    }

    var location_unregister = $scope.$watch('metadata.current_location_retrieved', function(newVal, oldVal){
        if(newVal != oldVal && newVal === true){
            $scope.retrieve();
            location_unregister();
        }
    })

    var reset_error = () => {
        $scope.carsCollectionCtrl.error.retrieve = false;
        $scope.carsCollectionCtrl.error.message.retrieve = [];
    }

    $scope.retrieve = () => {
        var parsedParams = parseParams();
        $scope.carsCollectionCtrl.loading.retrieve = true;
        console.log('RETRIEVING CARS');
        console.log('GET URL: ', ENV.API_URL + 'cars?' + parsedParams);
        $http.get(ENV.API_URL + 'cars?' + parsedParams)
        .then((data)=>{
            console.log(data.data); 
            let response = data.data;
            $scope.cars = response.data;
            $scope.carsCollectionCtrl.last_page = response.last_page;
            $scope.carsCollectionCtrl.current_page = response.current_page;
            
            reset_error();
            $scope.carsCollectionCtrl.loading.retrieve = false;
            if($scope.carsCollectionCtrl.last_page < $scope.carsCollectionCtrl.current_page){
                $scope.carsCollectionCtrl.current_page = $scope.carsCollectionCtrl.last_page;
                $location.search('page', $scope.carsCollectionCtrl.last_page)
                $scope.retrieve()
            }
            $scope.digest();
        }, (data)=>{
            console.log(data)
            let response = data.data;
            $scope.carsCollectionCtrl.error.retrieve = true;
            $scope.carsCollectionCtrl.error.message.retrieve = ['Error fetching cars'];
            $scope.carsCollectionCtrl.loading.retrieve = false;
            $scope.digest();
        });
    }

    var parseParams = () => {
        var p = "";
        var pCount = 0;
        if($scope.carsCollectionCtrl.current_page > 1){
            p += ("page=" + $scope.carsCollectionCtrl.current_page);
            pCount++;
        }
        if($rootScope.metadata.current_location !== null){
            if(pCount > 0){
                p += "&";
            }
            p += ("lat="+$rootScope.metadata.current_location.latitude);
            p += "&";
            p += ("long="+$rootScope.metadata.current_location.longitude);
            pCount++;
        }
        return p;
    }
}]);