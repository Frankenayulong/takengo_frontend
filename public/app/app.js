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
        fb_signing: true,
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
        $rootScope.metadata.fb_signing = false;
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
            if(!$rootScope.metadata.vendor_callback){
                $scope.register_uid().then(() => {
                    $scope.check_token().then(() => {
                        $scope.get_user_profile().then(()=>{}).catch(()=>{})  
                    }).catch(()=>{
                        console.log('signing out');
                        $scope.signout();
                    })
                }).catch(()=>{});
                
            }else{
                $rootScope.metadata.vendor_callback = false;
            }
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
        return new Promise((resolve, reject) => {
            $http.post(ENV.API_URL + 'token',{
                email: $rootScope.metadata.email
            }).then(function(data){
                console.log('check_token');
                console.log(data);
                console.log('end of check_token');
                if(data.data.status == 'OK'){
                    resolve();
                }else{
                    reject();
                }
            }, (err) => {
                console.log('check_token');
                console.log(err);
                console.log('end of check_token');
                reject();
            })
        })        
    }
    $scope.get_user_profile = () => {
        return new Promise((resolve, reject) => {
            $http.post(ENV.API_URL + 'get_profile',{
                email: $rootScope.metadata.email
            }).then((data) => {
                console.log('get_profile');
                console.log(data);
                console.log('end of get_profile');
                resolve(data);
            }, (err) => {
                console.log('get_profile');
                console.log(err);
                console.log('end of get_profile');
                reject();
            })
        })
    }

    $scope.register_uid = () => {
        return new Promise((resolve, reject) => {
            $http.post(ENV.API_URL + 'register/uid',{
                fb_uid: $rootScope.metadata.fb_uid,
                email: $rootScope.metadata.email
            }).then((data) => {
                console.log('register_uid');
                console.log(data);
                console.log('end of register_uid');
                resolve();
            }, (err) => {
                console.log('register_uid');
                console.log(err);
                console.log('end of register_uid');
                if(err.status === 422){
                    resolve();
                }else{
                    reject();
                }
            })
        })
    }

    $scope.register_vendor = (user) => {
        return new Promise((resolve, reject) => {
            $http.post(ENV.API_URL + 'register/vendor', {
                email: user.email,
                fb_uid: user.uid
            }, {
                responseType: 'json'
            }).then((data) => {
                console.log(data)
                if(data.data.status == 'OK'){
                    resolve();
                }else{
                    reject();
                }
            }, (err) => {
                console.log(err);
                $scope.digest();
                console.log('register_vendor logout')
                $scope.signout();
                reject();
            })
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
        if(result.user){
            console.log('vendor');
            console.log(result.user);
            $rootScope.metadata.vendor_callback = true;
            // The signed-in user info.
            var user = result.user;
            console.log('vendor logging');
            console.log(user);
            console.log('end of vendor logging');
            $scope.register_vendor(user).then(() => {
                console.log('geting user profile from vendor')
                $scope.get_user_profile();
                $scope.digest();
            }).catch(()=>{});
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