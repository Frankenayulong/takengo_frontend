app.controller('signUpController', ['$scope', '$rootScope', '$timeout', '$http', 'ENV', function($scope, $rootScope, $timeout, $http, ENV){
    
    $scope.signup_error = {
        email: false,
        password_confirmation: false,
        password: false,
        message: {
            email: [],
            password_confirmation: [],
            password: []
        }
    };

    $scope.reset_input = () => {
        $scope.signup_information = {
            email: '',
            password: '',
            password_confirmation: ''
        };
    };

    $scope.reset_input();

    $scope.signup = () => {
        const {email, password, password_confirmation} = $scope.signup_information;  
        if(password != password_confirmation){
            $scope.signup_error.password_confirmation = true;
            $scope.signup_error.message.password_confirmation = ['Password does not match'];
            return;
        }
        $rootScope.metadata.loading.sign_up = true;
        $http.post(ENV.API_URL + 'register', {
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