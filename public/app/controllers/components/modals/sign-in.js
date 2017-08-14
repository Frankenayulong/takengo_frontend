app.controller('signInController', ['$scope', '$rootScope', '$timeout', '$http', 'API_URL', function($scope, $rootScope, $timeout, $http, API_URL){
	$scope.signin_information = {
        email: '',
        password: ''
    };
    $scope.signin = () => {
       
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