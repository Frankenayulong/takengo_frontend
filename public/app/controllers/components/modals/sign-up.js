app.controller('signUpController', ['$scope', '$rootScope', '$timeout', '$http', 'ENV', function($scope, $rootScope, $timeout, $http, ENV){
    
    $scope.signup_error = {
        first_name: false,
        last_name: false,
        email: false,
        password_confirmation: false,
        password: false,
        message: {
            first_name: [],
            last_name: [],
            email: [],
            password_confirmation: [],
            password: []
        }
    };

    $scope.reset_input = () => {
        $scope.signup_information = {
            first_name: '',
            last_name: '',
            email: '',
            password: '',
            password_confirmation: ''
        };
    };

    $scope.reset_input();

    $scope.signup = () => {
        const {first_name, last_name, email, password, password_confirmation} = $scope.signup_information;  
        if(password != password_confirmation){
            $scope.signup_error.password_confirmation = true;
            $scope.signup_error.message.password_confirmation = ['Password does not match'];
            return;
        }
        $rootScope.metadata.loading.sign_up = true;
        $http.post(ENV.API_URL + 'register', {
            first_name: first_name,
            last_name: last_name,
            email: email,
            password: password,
            password_confirmation: password_confirmation
        })
        .then((data)=>{
            console.log(data);            
            $rootScope.metadata.loading.sign_up = false;
            $scope.authenticate.check();
            $scope.modalFunc.closeAuth();
            $('#sign-up-success').modal('show');
        }, (data)=>{
            if(data.status == 422){
                let response = data.data;
                console.log(response);
                if(response.first_name){
                    $scope.signup_error.first_name = true;
                    $scope.signup_error.message.first_name = response.first_name;
                }
                if(response.last_name){
                    $scope.signup_error.last_name = true;
                    $scope.signup_error.message.last_name = response.last_name;
                }
                if(response.email){
                    $scope.signup_error.email = true;
                    $scope.signup_error.message.email = response.email;
                }
                if(response.password){
                    $scope.signup_error.password = true;
                    $scope.signup_error.message.password = response.password;
                }
                if(response.password_confirmation){
                    $scope.signup_error.password_confirmation = true;
                    $scope.signup_error.message.password_confirmation = response.password_confirmation;
                }
                $rootScope.metadata.loading.sign_up = false;
                $scope.digest();
            }
        });
        
    }
}]);