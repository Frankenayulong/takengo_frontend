app.controller('signInController', ['$scope', '$rootScope', '$timeout', '$http', 'ENV', function($scope, $rootScope, $timeout, $http, ENV){
    
    $scope.signin_error = {
        email: false,
        password: false,
        error: false,
        message: {
            email: [],
            password: [],
            error: []
        }
    };

    $scope.reset_input = () => {
        $scope.signin_information = {
            email: '',
            password: ''
        };
    };

    var reset_error = () => {
        $scope.signin_error.error = false;
        $scope.signin_error.message.error = [];
    }

    $scope.reset_input();

    $scope.signin = () => {
        const {email, password} = $scope.signin_information; 
        $rootScope.metadata.loading.sign_in = true;
        $http.post(ENV.API_URL + 'login', {
            email: email,
            password: password
        })
        .then((data)=>{
            console.log(data);            
            $rootScope.metadata.loading.sign_in = false;

            //RESET INPUT & ERRORS
            $scope.reset_input();
            reset_error();
            $scope.authenticate.check();
            $scope.modalFunc.closeAuth();
        }, (data)=>{
            let response = data.data;
            $scope.signin_error.error = true;
            $scope.signin_error.message.error = ['Invalid email or password!'];
            $rootScope.metadata.loading.sign_in = false;
            $scope.digest();
        });
    }
}]);