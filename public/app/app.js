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
        email_verified: false,
        signing: true,
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

    $scope.authenticate = {};

    $scope.authenticate.check = () => {
        $scope.authenticate.check_token().then(()=>{
            $scope.modalFunc.closeAuth();
            $scope.authenticate.get_profile().then((data)=>{
                var user = (data.data || {}).user;
                var userStatus = JSON.parse(user.status);
                $rootScope.metadata.signing = false;
                $rootScope.metadata = Object.assign($rootScope.metadata, {
                    signed_in: true,
                    email: user.email,
                    uid: user.uid,
                    email_verified: userStatus.verified
                })
                $scope.digest();
                console.log($rootScope.metadata);
            }).catch(() => {
                $scope.authenticate.sign_out();
            });
        }).catch(()=>{
            $scope.authenticate.sign_out();
        })
    }

    $scope.authenticate.get_profile = () => {
        return new Promise((resolve, reject) => {
            $http.post(ENV.API_URL + 'profile').then((data) => {
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

    $scope.authenticate.check_token = () => {
        return new Promise((resolve, reject) => {
            $http.post(ENV.API_URL + 'token').then(function(data){
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

    $scope.authenticate.sign_out = () => {
        console.log('signing out');
        $rootScope.metadata.signing = false;
        $rootScope.metadata = Object.assign($rootScope.metadata, {
            signed_in: false,
            email_verified: false,
            tng_uid: '',
            email: ''
        })
        $http.post(ENV.API_URL + 'reset_auth').then((data) => {
            console.log(data);
        }, (err) => {
            
        })
        $scope.digest();
    }

    $scope.authenticate.check();
}])