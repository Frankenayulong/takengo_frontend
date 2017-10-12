app.controller('bookingHistoryController', ['$scope', '$rootScope', '$http', 'ENV', '$window', function($scope, $rootScope, $http, ENV, $window){
    $scope.$watchGroup(['metadata.signed_in', 'metadata.signing'], function(newVal, oldVal) {
        if(newVal[0] == false && newVal[1] == false){
            $window.location = ENV.BASE_URL;
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
                $scope.digest(()=>{
                    $('#'+id+'-completed').show();
                    $('#'+id+'-canceled').hide();
                    $('#'+id+'-action').hide();
                });
            }, (data)=>{
                console.log(data);
                $scope.requesting = false;
                $scope.request_id = -1;
                $scope.digest();
            });
            
        }
    }

    $scope.start = (id) => {
        if($scope.requesting){
            $.snackbar({content: "Please wait..."});
            return;
        }else{
            $scope.requesting = true;
            $scope.request_id = id;
            $http.post(ENV.API_URL + 'booking/'+id+'/start', {
                latitude: ($rootScope.metadata.current_location || {}).latitude,
                longitude: ($rootScope.metadata.current_location || {}).longitude
            }, {
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
                if(response.status != 'OK'){
                    return;
                }
                $scope.digest(()=>{
                    $('#'+id+'-canceled').hide();
                    $('#'+id+'-completed').hide();
                    $('#'+id+'-action').show();
                    $('#'+id+'-start').hide();
                    $('#'+id+'-extends-optional').show();
                });
                var start_date = moment(data.data.start_date.date);
                var end_date = moment(data.data.end_date.date);
                var duration = moment.duration(moment().diff(start_date));
                var hours = duration.asHours();
                hours = Math.max(hours, 1);
                var price = data.data.price;
                price = (price / 24) * hours;
                console.log(price);
                console.log(data.data.price);
                $('#'+id+'-price').html("$" + new Intl.NumberFormat().format(price.toFixed(2)))
                $('#'+id+'-start-date').html(start_date.format('hh:mm A'))
                $('#'+id+'-end-date').html(end_date.format('hh:mm A'))
            }, (data)=>{
                console.log(data);
                $scope.requesting = false;
                $scope.request_id = -1;
                $scope.digest();
            });
            
        }
    }

    $scope.cancel = (id) => {
        if($scope.requesting){
            $.snackbar({content: "Please wait..."});
            return;
        }else{
            $scope.requesting = true;
            $scope.request_id = id;
            $http.post(ENV.API_URL + 'booking/'+id+'/cancel', {
                latitude: ($rootScope.metadata.current_location || {}).latitude,
                longitude: ($rootScope.metadata.current_location || {}).longitude
            }, {
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
                if(response.status != 'OK'){
                    return;
                }
                $scope.digest(()=>{
                    $('#'+id+'-canceled').show();
                    $('#'+id+'-completed').hide();
                    $('#'+id+'-action').hide();
                    $('#'+id+'-start').hide();
                });
                var start_date = moment(data.data.start_date.date);
                var end_date = moment(data.data.end_date.date);
                $('#'+id+'-end-date').html(end_date.format('hh:mm A'))

                var duration = moment.duration(end_date.diff(start_date));
                var hours = duration.asHours();
                hours = Math.max(hours, 1);
                var price = data.data.price;
                price = parseFloat(price);
                console.log(hours);
                price = price / 24 * hours;
                $('#'+id+'-price').html("$" + new Intl.NumberFormat().format(price.toFixed(2)))
            }, (data)=>{
                console.log(data);
                $scope.requesting = false;
                $scope.request_id = -1;
                $scope.digest();
            });
            
        }
    }
}]);