app.controller('profileEditController', ['$scope', '$rootScope', '$http', 'ENV', function($scope, $rootScope, $http, ENV){
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
        birth_date: moment().format('DD MMMM YYYY'),
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

    $scope.save_profile = () => {
        var birth_date = $scope.profile_form.birth_date;
        $http.put(ENV.API_URL + 'profile/edit', $scope.profile_form)
        .then((data)=>{
            console.log(data);     
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

    setTimeout(()=>{
        $http.put(ENV.API_URL + 'profile/edit', {})
        .then((data)=>{
            console.log('vero');
            console.log(data);     
        }, (data)=>{
            console.log(data);
        });
    
        $http.post(ENV.API_URL + 'user/document/upload/4', {})
        .then((data)=>{
            console.log('nduttt');
            console.log(data);     
        }, (data)=>{
            console.log(data);
        });
    }, 2000)
}]);

app.controller('profileDocumentController', ['$scope', '$rootScope', '$http', 'ENV', function($scope, $rootScope, $http, ENV){
    $scope.slim = {
        api_url: ENV.API_URL + 'user/document/upload/4',
        // called when slim has initialized
        init: function (data, slim) {
            // slim instance reference
            console.log(slim);

            // current slim data object and slim reference
            console.log(data);
        },

        upload: function (error, data, response) {
            console.log(error, data, response);
        }
    }
}]);