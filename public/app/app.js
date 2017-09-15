var env = {};

// Import variables if present (from env.js)
if(window){  
  Object.assign(env, window.__env);
}

var app = angular.module('takeNGo', 
['slim', 
'ngGeolocation', 
'ngCookies',
'ngMap']
)
.constant('ENV', env)
.config(function ($httpProvider) {
    $httpProvider.defaults.withCredentials = true;
})
.config(['$locationProvider', function($locationProvider) {
    $locationProvider.html5Mode(false)
    .hashPrefix('');
}])

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
            $scope.authenticate.get_profile().then((data)=>{
                var user = (data.data || {}).user;
                $rootScope.metadata.signing = false;
                $rootScope.metadata = Object.assign($rootScope.metadata, {
                    signed_in: true,
                    email: user.email,
                    uid: user.uid,
                    email_verified: user.s_verified,
                    booking: user.bookings.length > 0 ? user.bookings[0] : null 
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
            $http.post(ENV.API_URL + 'token',{},{
                headers: {
                    'X-TKNG-UID': $cookies.get('fe_uid'),
                    'X-TKNG-TKN': $cookies.get('fe_token'),
                    'X-TKNG-EM': $cookies.get('fe_email')
                }
            }).then(function(data){
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
                    $cookies.put('fe_uid', data.data.uid, {path: '/'});
                    $cookies.put('fe_token', data.data.token, {path: '/'});
                    $cookies.put('fe_email', data.data.email, {path: '/'});
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
        $cookies.remove('fe_uid', {path: '/'});
        $cookies.remove('fe_token', {path: '/'});
        $cookies.remove('fe_email', {path: '/'});
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

    $scope.global_cancel = (id) => {
        if($scope.zrequesting){
            $.snackbar({content: "Please wait..."});
            return;
        }else{
            $scope.zrequesting = true;
            $scope.zrequest_id = id;
            $http.post(ENV.API_URL + 'booking/'+id+'/cancel', {
                latitude: ($rootScope.metadata.current_location || {}).latitude,
                longitude: ($rootScope.metadata.current_location || {}).longitude
            }, {
                headers:{
                    'X-TKNG-UID': $rootScope.metadata.auth.uid,
                    'X-TKNG-TKN': $rootScope.metadata.auth.token,
                    'X-TKNG-EM': $rootScope.metadata.auth.email
                }
            })
            .then((data)=>{
                console.log(data.data); 
                let response = data.data;
                $scope.zrequesting = false;
                $scope.zrequest_id = -1;
                $scope.metadata.booking = null;
                $scope.digest();
            }, (data)=>{
                console.log(data);
                $scope.zrequesting = false;
                $scope.zrequest_id = -1;
                $scope.digest();
            });
            
        }
    }

    $scope.isValidDate = (str) => {
        var d = moment(str,'YYYY-M-DD');
        if(d == null || !d.isValid()) return false;
        return true;
    }
}]);