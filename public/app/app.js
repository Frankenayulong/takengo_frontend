var env = {};

// Import variables if present (from env.js)
if(window){  
  Object.assign(env, window.__env);
}

var app = angular.module('takeNGo', ['slim', 'ngGeolocation', 'ngCookies'])
.constant('ENV', env)
.config(function ($httpProvider) {
    $httpProvider.defaults.withCredentials = true;
});

app.config(['$locationProvider', function($locationProvider) {
    $locationProvider.html5Mode({
        enabled: true,
        requireBase: false
    });
}]);

app.controller('mainController', ['$scope', '$timeout', '$http', '$rootScope', 'ENV', '$geolocation', '$cookies', function($scope, $timeout, $http, $rootScope, ENV, $geolocation, $cookies){
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

    $scope.range = function(n) {
        return new Array(n);
    };

    $rootScope.metadata = {
        signed_in: false,
        email_verified: false,
        signing: true,
        tng_uid: '',
        email: '',
        loading: {
            sign_up: false,
            sign_in: false
        },
        auth: {},
        current_location: null,
        current_location_retrieved: false
    };

    $geolocation.watchPosition({
        timeout: 60000,
        maximumAge: 250,
        enableHighAccuracy: true
    });
    console.log($geolocation)

    $scope.$on('$geolocation.position.changed', function(events, args){
        $rootScope.metadata.current_location = {
            latitude: args.coords.latitude,
            longitude: args.coords.longitude,
            timestamp: args.timestamp
        };
        $rootScope.metadata.current_location_retrieved = true;
        console.log($rootScope.metadata.current_location);
        $scope.digest();
    })

    $scope.modalFunc = {
        closeAuth: () => {
            $('#signup-form').modal('hide');
            $('#login-form').modal('hide');
            $('#forget-password-form').modal('hide');
        }
    };

    $scope.authenticate = {};

    $scope.authenticate.check = () => {
        $scope.authenticate.check_token().then(()=>{
            $scope.modalFunc.closeAuth();
            // $scope.authenticate.register_auth().then(()=>{
            //     console.log('register auth success');
            // }).catch(()=>{
            //     console.log('register auth fail');
            // })
            $scope.authenticate.get_profile().then((data)=>{
                var user = (data.data || {}).user;
                $rootScope.metadata.signing = false;
                $rootScope.metadata = Object.assign($rootScope.metadata, {
                    signed_in: true,
                    email: user.email,
                    uid: user.uid,
                    email_verified: user.s_verified
                });
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
            $http.post(ENV.API_URL + 'profile', {}, {
                headers:{
                    'X-TKNG-UID': $rootScope.metadata.auth.uid,
                    'X-TKNG-TKN': $rootScope.metadata.auth.token,
                    'X-TKNG-EM': $rootScope.metadata.auth.email
                }
            }).then((data) => {
                console.log('get_profile');
                console.log(data);
                console.log('end of get_profile');
                resolve(data);
            }, (err) => {
                console.log('err get_profile');
                console.log(err);
                console.log('end of get_profile');
                reject();
            });
        });
    }

    $scope.authenticate.check_token = () => {
        return new Promise((resolve, reject) => {
            $http.post(ENV.API_URL + 'token').then(function(data){
                console.log('check_token');
                console.log(data);
                console.log('end of check_token');
                if(data.data.status == 'OK'){
                    console.log(data.data);
                    $rootScope.metadata.auth = {
                        uid: data.data.uid,
                        token: data.data.token,
                        email: data.data.email,
                        first_name: data.data.first_name
                    }
                    $cookies.put('fe_uid', data.data.uid);
                    $cookies.put('fe_token', data.data.token);
                    $cookies.put('fe_email', data.data.email);
                    resolve();
                }else{
                    reject();
                }
            }, (err) => {
                console.log('check_token err');
                console.log(err.data);
                console.log('end of check_token err');
                reject();
            });
        });
    }

    $scope.authenticate.register_auth = () => {
        return new Promise((resolve, reject) => {
            $http.post('/register-auth',{},{
                headers: {
                    'X-TKNG-UID': $rootScope.metadata.auth.uid,
                    'X-TKNG-TKN': $rootScope.metadata.auth.token,
                    'X-TKNG-EM': $rootScope.metadata.auth.email
                }
            }).then((data) => {
                resolve();
                console.log(data);
            }, (err) => {
                console.log(err);
                reject();
            });
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
        });
        $http.post(ENV.API_URL + 'reset_auth').then((data) => {
            console.log(data);
        }, (err) => {
            
        });
        $scope.digest();
    }

    $(document).ready(()=>{
        setTimeout($scope.authenticate.check, 500)
    })
}]);