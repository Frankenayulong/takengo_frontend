app.controller('carsBookingController', ['$scope', '$rootScope', '$http', 'ENV', '$location', 'NgMap', '$window', function($scope, $rootScope, $http, ENV, $location, NgMap, $window){
    $scope.$watchGroup(['metadata.signed_in', 'metadata.signing'], function(newVal, oldVal) {
        if(newVal[0] == false && newVal[1] == false){
            $window.history.back();
        }
    });
    $scope.book_error = {
        book_start_date: false,
        message: {
            book_start_date: []
        }
    };

    $scope.book_form = {
        book_start_date: moment().format('DD MMMM YYYY'),
        book_end_date: moment().format('DD MMMM YYYY')
    };
    $("#caleran-header").caleran({
        inline: true,
        calendarCount: 2,
        showHeader: false,
        showFooter: false,
        format: 'DD MMMM YYYY',
        minDate: new Date(),
        enableKeyboard: true,
        onafterselect: function(caleran, startDate, endDate){
            // caleran: caleran object instance
            // startDate: moment.js instance
            // endDate: moment.js instance
            $scope.book_form.book_start_date = startDate.format('DD MMMM YYYY');
            $scope.book_form.book_end_date = endDate.format('DD MMMM YYYY');
            console.log($scope.book_form);
            $scope.digest();
        }
    });
}]);