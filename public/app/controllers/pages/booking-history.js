app.controller('bookingHistoryController', ['$scope', '$rootScope', '$http', 'ENV', '$window', function($scope, $rootScope, $http, ENV, $location, NgMap, $window){
    $scope.$watchGroup(['metadata.signed_in', 'metadata.signing'], function(newVal, oldVal) {
        if(newVal[0] == false && newVal[1] == false){
            $window.history.back();
        }
    });
    $scope.request_id = -1;
    $scope.requesting = false;
    $scope.pay = (id) => {
        if($scope.requesting){
            $.snackbar({content: "Please wait..."});
            return;
        }else{
            $scope.requesting = true;
            $scope.request_id = id;
            $http.post(ENV.API_URL + 'booking/'+id+'/pay', {}, {
                headers:{
                    'X-TKNG-UID': $rootScope.metadata.auth.uid,
                    'X-TKNG-TKN': $rootScope.metadata.auth.token,
                    'X-TKNG-EM': $rootScope.metadata.auth.email
                }
            })
            .then((data)=>{
                console.log(data.data); 
                let response = data.data;
                $scope.requesting = false;
                $scope.request_id = -1;
                $scope.digest();
            }, (data)=>{
                console.log(data);
                $scope.requesting = false;
                $scope.request_id = -1;
                $scope.digest();
            });
            
        }
    }
}]);