app.controller('signInController', ['$scope', '$rootScope', '$timeout', '$http', 'ENV', '$cookies', function($scope, $rootScope, $timeout, $http, ENV, $cookies){
    
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
            $cookies.put('fe_uid', data.data.uid, {path: '/'});
            $cookies.put('fe_token', data.data.token, {path: '/'});
            $cookies.put('fe_email', data.data.email, {path: '/'});
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