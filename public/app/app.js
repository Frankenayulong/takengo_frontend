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
            sign_up: false,
            sign_in: false
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
            $('#login-form').modal('hide');
            $('#forget-password-form').modal('hide');
        }
    }

    firebase.auth().onAuthStateChanged(function(user) {
        console.log('auth changed');
        $rootScope.metadata.fb_signing = false;
        
        if (user) {
            user.getIdToken().then(token=>{
                console.log(token)
            })
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
                if($rootScope.metadata.loading.sign_up){
                    $scope.register_uid(user).then(() => {
                        $scope.sign_in_cycle(user).then(()=>{
                            $rootScope.metadata.loading.sign_up = false;
                        }).catch(()=>{
                            $rootScope.metadata.loading.sign_up = false;
                        })
                    }).catch(()=>{});
                }else{
                    $scope.server_login(user).then(() => {
                        console.log('server_login next');
                        console.log(user);
                        $scope.sign_in_cycle(user).then(()=>{
                            console.log('sign_in_cycle success');
                            $rootScope.metadata.loading.sign_in = false;
                        }).catch(()=>{
                            console.log('sign_in_cycle fail')
                            $rootScope.metadata.loading.sign_in = false;
                        })
                    }).catch(()=>{});
                }
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

    $scope.sign_in_cycle = (user) => {
        return new Promise((resolve, reject) => {
            console.log(user.uid);
            $scope.check_token(user).then(() => {
                console.log('check_token success');
                $scope.get_user_profile().then(()=>{
                    resolve();
                }).catch(()=>{
                    reject();
                })  
            }).catch(()=>{
                console.log('signing out');
                $scope.signout();
                reject();
            })
        })
    }

    $scope.check_token = (user) => {
        return new Promise((resolve, reject) => {
            $http.post(ENV.API_URL + 'token',{
                email: user.email
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
                console.log('check_token err');
                console.log(err);
                console.log('end of check_token err');
                reject();
            })
        })        
    }
    $scope.get_user_profile = () => {
        return new Promise((resolve, reject) => {
            $http.post(ENV.API_URL + 'profile',{
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

    $scope.register_uid = (user) => {
        return new Promise((resolve, reject) => {
            $http.post(ENV.API_URL + 'register/uid',{
                fb_uid: user.uid,
                email: user.email
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

    $scope.server_login = (user) => {
        return new Promise((resolve, reject) => {
            $http.post(ENV.API_URL + 'login', {
                email: user.email,
                fb_uid: user.uid
            }).then((data) => {
                console.log(data)
                console.log('server_login')
                if(data.data.status == 'OK'){
                    console.log('server_login OK');
                    resolve();
                }else{
                    reject();
                }
            }, (err) => {
                console.log(err);
                $scope.digest();
                console.log('login_attempt logout')
                $scope.signout();
                reject();
            })
        })
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