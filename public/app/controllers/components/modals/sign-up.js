app.controller('signUpController', ['$scope', '$timeout', '$http', function($scope, $timeout, $http){
    $scope.signup_information = {
        email: '',
        password: '',
        password_confirmation: ''
    };
    $scope.signup = () => {
        console.log($scope.signup_information) 
        const {email, password, password_confirmation} = $scope.signup_information;  
        console.log(email);
        console.log(password);
        firebase.auth().createUserWithEmailAndPassword(email, password).catch(function(error) {
            var errorCode = error.code;
            var errorMessage = error.message;
            console.log(errorMessage)
        });
    }
}])