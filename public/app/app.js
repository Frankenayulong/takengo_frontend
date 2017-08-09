var app = angular.module('takeNGo', [])
.constant('API_URL', 'http://api.takengo.dev/');
//.constant('API_URL', 'http://api.takengo.io/');

app.controller('mainController', ['$scope', '$timeout', '$http', '$rootScope', function($scope, $timeout, $http, $rootScope){
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

    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
            // User is signed in.
            $rootScope.metadata.signed_in = true;
            $rootScope.metadata.email = user.email;
            $rootScope.metadata = Object.assign($rootScope.metadata, {
                email: user.email,
                uid: user.uid,
                email_verified: user.emailVerified
            })
        } else {
            // No user is signed in.
            console.log('no user signed in')
            $rootScope.metadata.signed_in = false;
        }
    });
}])