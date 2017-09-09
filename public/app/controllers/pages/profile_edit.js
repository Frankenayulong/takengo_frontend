app.controller('profileEditController', [
    '$scope', '$rootScope', '$http', 'ENV', '$window', 
function($scope, $rootScope, $http, ENV, $window){
    $scope.$watchGroup(['metadata.signed_in', 'metadata.signing'], function(newVal, oldVal) {
        if(newVal[0] == false && newVal[1] == false){
            $window.history.back();
        }
    });
    $scope.profile_error = {
        first_name: false,
        last_name: false,
        gender: false,
        birth_date: false,
        address: false,
        suburb: false,
        state: false,
        post_code: false,
        message: {
            first_name: [],
            last_name: [],
            gender: [],
            birth_date: [],
            address: [],
            suburb: [],
            state: [],
            post_code: [],
        }
    };

    $scope.profile_form = {
        first_name: '',
        last_name: '',
        gender: '',
        birth_date: null,
        address: '',
        suburb: '',
        state: '',
        post_code: ''
    };

    $("#caleran-header").caleran({
        singleDate: true,
        calendarCount: 1,
        showHeader: false,
        showFooter: false,
        autoCloseOnSelect: true,
        format: 'DD MMMM YYYY',
        maxDate: new Date(),
        enableKeyboard: true,
        onafterselect: function(caleran, startDate, endDate){
            // caleran: caleran object instance
            // startDate: moment.js instance
            // endDate: moment.js instance
            $scope.profile_form.birth_date = startDate.format('DD MMMM YYYY');
            $scope.digest();
        }
    });

    $scope.init_birth_date = (date)=>{
        if($scope.isValidDate(date)){
            $scope.profile_form.birth_date = moment(date).format('DD MMMM YYYY');
        }
    }

    $scope.save_profile = () => {
        $http.put(ENV.API_URL + 'profile/edit', $scope.profile_form,{
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

app.controller('profileDocumentController', ['$scope', '$rootScope', '$http', 'ENV', '$window', function($scope, $rootScope, $http, ENV, $window){
    $scope.slim = {
        api_url: ENV.API_URL + 'user/document/upload',
        // called when slim has initialized
        init: function (data, slim) {
            // slim instance reference
            console.log(slim);

            // current slim data object and slim reference
            console.log(data);
        },
        will_request: function(xhr){
            xhr.setRequestHeader('X-TKNG-UID', $rootScope.metadata.auth.uid);
            xhr.setRequestHeader('X-TKNG-TKN', $rootScope.metadata.auth.token);
            xhr.setRequestHeader('X-TKNG-EM', $rootScope.metadata.auth.email);
            console.log($rootScope.metadata.auth.uid)
        },
        upload: function (error, data, response) {
            console.log(error, data, response);
        }
    }

    $scope.driver_license_error = {
        number: false,
        exp_date: false,
        country_issuer: false,
        message: {
            number: [],
            exp_date: [],
            country_issuer: []
        }
    };

    $scope.driver_license_form = {
        number: '',
        exp_date: null,
        country_issuer: ''
    };

    $scope.init_expiry_date = (date)=>{
        if($scope.isValidDate(date)){
            $scope.driver_license_form.exp_date = moment(date).format('DD MMMM YYYY');
        }
    }

    $("#caleran-exp-date").caleran({
        singleDate: true,
        calendarCount: 1,
        showHeader: false,
        showFooter: false,
        autoCloseOnSelect: true,
        format: 'DD MMMM YYYY',
        minDate: new Date(),
        enableKeyboard: true,
        onafterselect: function(caleran, startDate, endDate){
            // caleran: caleran object instance
            // startDate: moment.js instance
            // endDate: moment.js instance
            $scope.driver_license_form.exp_date = startDate.format('DD MMMM YYYY');
            $scope.digest();
        }
    });

    $scope.save_driver_license = () => {
        $http.put(ENV.API_URL + 'profile/driverlicense/edit', $scope.driver_license_form,{
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
                if(response.number){
                    $scope.driver_license_error.number = true;
                    $scope.driver_license_error.message.number = response.number;
                }
                if(response.exp_date){
                    $scope.driver_license_error.exp_date = true;
                    $scope.driver_license_error.message.exp_date = response.exp_date;
                }
                if(response.country_issuer){
                    $scope.driver_license_error.country_issuer = true;
                    $scope.driver_license_error.message.country_issuer = response.country_issuer;
                }
                $scope.digest();
            }
        });
    }
}]);