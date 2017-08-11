var app = angular.module('takeNGo', [])
.constant('API_URL', 'http://api.takengo.dev/api/')
.config(function ($httpProvider) {
    $httpProvider.defaults.withCredentials = true;
    //rest of route code
})
//.constant('API_URL', 'http://api.takengo.io/');

app.controller('mainController', ['$scope', '$timeout', '$http', '$rootScope', 'API_URL', function($scope, $timeout, $http, $rootScope, API_URL){
    $rootScope.metadata = {
        signed_in: false,
        email_verified: false,
        uid: '',
        email: ''
    }
    
    $scope.digest = function(a) {
        var waitForRenderAndDoSomething = function() {
            if ($http.pendingRequests.length > 0) {
                $timeout(waitForRenderAndDoSomething); // Wait for all templates to be loaded
            } else {
                if (a) {
                    return a();
                }
            }
        };
        return $timeout(waitForRenderAndDoSomething);
    };

    $scope.modalFunc = {
        closeAuth: () => {
            $('#signup-form').modal('hide');
            $('#signin-form').modal('hide');
            $('#forget-password-form').modal('hide');
        }
    }

    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
            // User is signed in.
            $rootScope.metadata = Object.assign($rootScope.metadata, {
                signed_in: true,
                email: user.email,
                uid: user.uid,
                email_verified: user.emailVerified
            })
            $scope.modalFunc.closeAuth();
            $scope.check_token();
            $scope.digest();
        } else {
            // No user is signed in.
            console.log('no user signed in')
            $rootScope.metadata = Object.assign($rootScope.metadata, {
                signed_in: false,
                email_verified: false,
                uid: '',
                email: ''
            })
            $http.post(API_URL + 'reset_auth').then(function(data){
                console.log(data);
            })
            $scope.digest();
        }
    });

    $scope.check_token = () => {
        $http.post(API_URL + 'token').then(function(data){
            console.log(data);
        })
    }
}])