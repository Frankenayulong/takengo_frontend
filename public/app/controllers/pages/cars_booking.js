app.controller('carsBookingController', ['$scope', '$rootScope', '$http', 'ENV', '$location', 'NgMap', '$window', function($scope, $rootScope, $http, ENV, $location, NgMap, $window){
    $scope.$watchGroup(['metadata.signed_in', 'metadata.signing'], function(newVal, oldVal) {
        if(newVal[0] == false && newVal[1] == false){
            $window.history.back();
        }
    });
    $scope.book_error = {
        book_start_date: false,
        message: {
            book_start_date: []
        }
    };

    $scope.book_form = {
        book_start_date: moment().format('DD MMMM YYYY'),
        book_end_date: moment().format('DD MMMM YYYY'),
        cid: '',
        uid: ''
    };
    $scope.book_other = {
        totalDays: 1,
        price_per_day: 0
    }
    $("#caleran-header").caleran({
        inline: true,
        calendarCount: 2,
        showHeader: false,
        showFooter: false,
        format: 'DD MMMM YYYY',
        minDate: new Date(),
        enableKeyboard: true,
        onafterselect: function(caleran, startDate, endDate){
            // caleran: caleran object instance
            // startDate: moment.js instance
            // endDate: moment.js instance
            $scope.book_form.book_start_date = startDate.format('DD MMMM YYYY');
            $scope.book_form.book_end_date = endDate.format('DD MMMM YYYY');
            $scope.book_other.totalDays = endDate.diff(startDate, 'days');
            if($scope.book_other.totalDays == 0){
                $scope.book_other.totalDays = 1;
            }
            console.log($scope.book_form);
            console.log($scope.book_other);
            $scope.digest();
        }
    });

    $scope.save_booking = () => {
        console.log($scope.book_form);
        return;
        $http.put(ENV.API_URL + 'book', $scope.book_form, {
            headers:{
                'X-TKNG-UID': $rootScope.metadata.auth.uid,
                'X-TKNG-TKN': $rootScope.metadata.auth.token,
                'X-TKNG-EM': $rootScope.metadata.auth.email
            }
        })
        .then((data)=>{
            console.log(data);
            $window.location.href = ENV.BASE_URL + 'profile';     
        }, (data)=>{
            console.log(data);
            if(data.status == 422){
                let response = data.data;
                if(response.first_name){
                    $scope.profile_error.first_name = true;
                    $scope.profile_error.message.first_name = response.first_name;
                }
                if(response.last_name){
                    $scope.profile_error.last_name = true;
                    $scope.profile_error.message.last_name = response.last_name;
                }
                if(response.gender){
                    $scope.profile_error.gender = true;
                    $scope.profile_error.message.gender = response.gender;
                }
                if(response.phone){
                    $scope.profile_error.phone = true;
                    $scope.profile_error.message.phone = response.phone;
                }
                if(response.birth_date){
                    $scope.profile_error.birth_date = true;
                    $scope.profile_error.message.birth_date = response.birth_date;
                }
                if(response.address){
                    $scope.profile_error.address = true;
                    $scope.profile_error.message.address = response.address;
                }
                if(response.suburb){
                    $scope.profile_error.suburb = true;
                    $scope.profile_error.message.suburb = response.suburb;
                }
                if(response.state){
                    $scope.profile_error.state = true;
                    $scope.profile_error.message.state = response.state;
                }
                if(response.post_code){
                    $scope.profile_error.post_code = true;
                    $scope.profile_error.message.post_code = response.post_code;
                }
                $scope.digest();
            }
        });
    }
}]);