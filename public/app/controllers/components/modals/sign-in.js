app.controller('signInController', ['$scope', '$rootScope', '$timeout', '$http', 'ENV', function($scope, $rootScope, $timeout, $http, ENV){
    
    $scope.signup_error = {
        email: false,
        password: false,
        message: {
            email: [],
            password: []
        }
    }

    $scope.reset_input = () => {
        $scope.signin_information = {
            email: '',
            password: ''
        };
    }

    $scope.reset_input();

    $scope.signin = () => {
       const {email, password} = $scope.signin_information; 
       $rootScope.metadata.loading.sign_in = true;

    }
    
    $scope.signin_vendor = (vendor = 'facebook') => {
        var provider = null;
        if(vendor == 'facebook'){
            provider = new firebase.auth.FacebookAuthProvider();
        }else if(vendor == 'google'){
            provider = new firebase.auth.GoogleAuthProvider();
        }else{
            return;
        }
        firebase.auth().signInWithRedirect(provider);
    }
}])