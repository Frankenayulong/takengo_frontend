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
        console.log(email);
        console.log(password);
        firebase.auth().signInWithEmailAndPassword(email, password).catch(function(error) {
            // Handle Errors here.
            var errorCode = error.code;
            var errorMessage = error.message;
            console.log(errorMessage)
            // ...
            $rootScope.metadata.loading.sign_in = false;
            $scope.signin_error.error = true;
            $scope.signin_error.message.error = ['Invalid email or password!'];
            $scope.digest();
        });
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