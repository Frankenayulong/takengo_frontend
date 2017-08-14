var env = {};

// Import variables if present (from env.js)
if(window){  
  Object.assign(env, window.__env);
}

var app = angular.module('takeNGo', [])
// .constant('ENV.API_URL', 'http://api.takengo.io/api/')
.constant('ENV', env)
.config(function ($httpProvider) {
    $httpProvider.defaults.withCredentials = true;
    //rest of route code
})
//.constant('ENV.API_URL', 'http://api.takengo.io/');

app.controller('mainController', ['$scope', '$timeout', '$http', '$rootScope', 'ENV', function($scope, $timeout, $http, $rootScope, ENV){
    $rootScope.metadata = {
        signed_in: false,
        new_sign_up: false,
        email_verified: false,
        vendor_callback: false,
        fb_uid: '',
        tng_uid: '',
        email: '',
        loading: {
            sign_up: false
        }
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
        console.log('auth changed');
        $rootScope.metadata.loading.sign_up = false;
        if (user) {
            // User is signed in.
            $rootScope.metadata = Object.assign($rootScope.metadata, {
                signed_in: true,
                email: user.email,
                fb_uid: user.uid,
                email_verified: user.emailVerified
            })
            $scope.modalFunc.closeAuth();
            if($rootScope.metadata.new_sign_up){
                $rootScope.metadata.new_sign_up = false;
                $('#sign-up-success').modal('show');
            }
            if($rootScope.metadata.vendor_callback){
                $scope.register_uid();
                $scope.check_token();
                $rootScope.metadata.vendor_callback = false;
            }
            $scope.get_user_profile();
            $scope.digest();
        } else {
            // No user is signed in.
            console.log('no user signed in')
            $rootScope.metadata = Object.assign($rootScope.metadata, {
                signed_in: false,
                email_verified: false,
                fb_uid: '',
                email: ''
            })
            $http.post(ENV.API_URL + 'reset_auth').then((data) => {
                console.log(data);
            }, (err) => {
                
            })
            $scope.digest();
        }
    });

    $scope.check_token = () => {
        console.log(ENV.API_URL)
        $http.post(ENV.API_URL + 'token').then(function(data){
            console.log('check_token');
            console.log(data);
            console.log('end of check_token');
        }, (err) => {
            console.log('check_token');
            console.log(err);
            console.log('end of check_token');
        })
    }
    $scope.get_user_profile = () => {
        $http.post(ENV.API_URL + 'get_profile').then((data) => {
            console.log('get_profile');
            console.log(data);
            console.log('end of get_profile');
        }, (err) => {
            console.log('get_profile');
            console.log(err);
            console.log('end of get_profile');
        })
    }

    $scope.register_uid = () => {
        $http.post(ENV.API_URL + 'register/uid',{
            fb_uid: $rootScope.metadata.fb_uid,
            email: $rootScope.metadata.email
        }).then((data) => {
            console.log('register_uid');
            console.log(data);
            console.log('end of register_uid');
        }, (err) => {
            console.log('register_uid');
            console.log(err);
            console.log('end of register_uid');
        })
    }

    $scope.signout = () => {
        firebase.auth().signOut().then(function() {
            
        }).catch(function(error) {
        // An error happened.
        console.log(error)
        });
    }

    firebase.auth().getRedirectResult().then(function(result) {
        console.log('vendor');
        if(result.user){
            $rootScope.metadata.vendor_callback = true;
            // This gives you a Facebook Access Token. You can use it to access the Facebook API.
            var token = result.credential.accessToken;
            // The signed-in user info.
            var user = result.user;
            console.log('facebook logging');
            console.log(user);
            console.log('end of facebook logging');
            $http.post(ENV.API_URL + 'register/vendor', {
                email: user.email,
                fb_uid: user.uid
            }, {
                responseType: 'json'
            }).then((data) => {
                console.log(data)
                $scope.digest();
            }, (err) => {
                console.log(err);
                $scope.digest();
                if(err.status !== 422){
                    $scope.signout();
                }
            })
        }
        
        // ...
    }).catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        // The email of the user's account used.
        var email = error.email;
        // The firebase.auth.AuthCredential type that was used.
        var credential = error.credential;
        // ...
        console.log(errorMessage);
    });
}])