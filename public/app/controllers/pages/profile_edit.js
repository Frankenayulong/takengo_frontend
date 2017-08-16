app.controller('profileEditController', ['$scope', '$rootScope', 'ENV', function($scope, $rootScope, ENV){
	$scope.slim = {
        api_url: '',
        // called when slim has initialized
        init: function (data, slim) {
            // slim instance reference
            console.log(slim);

            // current slim data object and slim reference
            console.log(data);
        },

        upload: function (error, data, response) {
            console.log(error, data, response);
        }
    }
}]);