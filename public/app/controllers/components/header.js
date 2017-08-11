app.controller('headerController', ['$scope', '$rootScope', function($scope, $rootScope){
	$scope.signout = () => {
        firebase.auth().signOut().then(function() {
            
        }).catch(function(error) {
        // An error happened.
        console.log(error)
        });
    }
}])