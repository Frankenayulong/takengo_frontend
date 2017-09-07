app.controller('carsBookingController', ['$scope', '$rootScope', '$http', 'ENV', '$location', 'NgMap', '$window', function($scope, $rootScope, $http, ENV, $location, NgMap, $window){
    $scope.$watchGroup(['metadata.signed_in', 'metadata.signing'], function(newVal, oldVal) {
        if(newVal[0] == false && newVal[1] == false){
            // $window.history.back();
        }
    });
    $scope.book_error = {
        book_start_date: false,
        valid: true,
        message: {
            book_start_date: []
        }
    };

    $scope.book_metadata = {
        loading: {
            booking: false
        },
        error: false
    }

    $scope.book_form = {
        book_start_date: null,
        book_end_date: null,
        cid: '',
        uid: ''
    };
    $scope.book_other = {
        totalDays: 1,
        price_per_day: 0,
        disabled: []
    }

    var checkValidity = (s, e) => {
        for(var i = 0; i < $scope.book_other.disabled.length; i++){
            obj = $scope.book_other.disabled[i];   
            var start = moment(obj.start_date).subtract(1, 'day');
            var end = moment(obj.end_date).add(1, 'day')
            if (s.isBefore(end) && e.isAfter(start)){
                return false
            } 
        }
        return true;
    }

    $scope.digest(()=>{
        console.log($scope.book_other);
        var disabledRanges = [];
        $scope.book_other.disabled.forEach((obj) => {
            disabledRanges.push({
                start: moment(obj.start_date).subtract(1, 'day'),
                end: moment(obj.end_date).add(1, 'day')
            });
        })
        $("#caleran-header").caleran({
            calendarCount: 1,
            singleDate: true,
            showHeader: false,
            showFooter: false,
            autoCloseOnSelect: true,
            format: 'DD MMMM YYYY',
            minDate: new Date(),
            enableKeyboard: true,
            disabledRanges: disabledRanges,
            startEmpty: true,
            onafterselect: function(caleran, startDate, endDate){
                // caleran: caleran object instance
                // startDate: moment.js instance
                // endDate: moment.js instance
                $scope.book_form.book_start_date = startDate;
                // $scope.book_form.book_end_date = endDate.format('DD MMMM YYYY');
                var valid = checkValidity($scope.book_form.book_start_date, $scope.book_form.book_end_date == null ? $scope.book_form.book_start_date : $scope.book_form.book_end_date);
                if(!valid){
                    $scope.book_error.valid = false;
                    $scope.digest();
                    return;
                }else{
                    $scope.book_error.valid = true;
                }
                if($scope.book_form.book_end_date != null){
                    $scope.book_other.totalDays = $scope.book_form.book_end_date.diff(startDate, 'days');
                }
                if($scope.book_other.totalDays == 0){
                    $scope.book_other.totalDays = 1;
                }
                console.log($scope.book_form);
                console.log($scope.book_other);
                $scope.digest();
            }
        });

        $("#caleran-end").caleran({
            calendarCount: 1,
            singleDate: true,
            showHeader: false,
            showFooter: false,
            autoCloseOnSelect: true,
            format: 'DD MMMM YYYY',
            minDate: new Date(),
            enableKeyboard: true,
            disabledRanges: disabledRanges,
            startEmpty: true,
            onafterselect: function(caleran, startDate, endDate){
                // caleran: caleran object instance
                // startDate: moment.js instance
                // endDate: moment.js instance
                // $scope.book_form.book_start_date = startDate.format('DD MMMM YYYY');
                $scope.book_form.book_end_date = endDate;
                var valid = checkValidity($scope.book_form.book_start_date == null ? $scope.book_form.book_end_date : $scope.book_form.book_start_date, $scope.book_form.book_end_date);
                if(!valid){
                    $scope.book_error.valid = false;
                    $scope.digest();
                    return;
                }else{
                    $scope.book_error.valid = true;
                }
                if($scope.book_form.book_start_date != null){
                    $scope.book_other.totalDays = $scope.book_form.book_end_date.diff($scope.book_form.book_start_date, 'days');
                }
                if($scope.book_other.totalDays == 0){
                    $scope.book_other.totalDays = 1;
                }
                console.log($scope.book_form);
                console.log($scope.book_other);
                $scope.digest();
            }
        });
    })

    $scope.save_booking = () => {
        if(!$scope.book_error.valid){
            return;
        }
        $scope.book_metadata.loading.booking = true;
        var req_payload = Object.assign({}, $scope.book_form, $rootScope.metadata.current_location);
        req_payload.book_end_date = req_payload.book_end_date.format('DD MMMM YYYY')
        req_payload.book_start_date = req_payload.book_start_date.format('DD MMMM YYYY')
        $http.post(ENV.API_URL + 'book', req_payload, {
            headers:{
                'X-TKNG-UID': $rootScope.metadata.auth.uid,
                'X-TKNG-TKN': $rootScope.metadata.auth.token,
                'X-TKNG-EM': $rootScope.metadata.auth.email
            }
        })
        .then((data)=>{
            $scope.book_metadata.loading.booking = false;
            $window.location.href = ENV.BASE_URL + 'history'; 
            console.log(data);
        }, (data)=>{
            $scope.book_metadata.loading.booking = false;
            $scope.book_metadata.error = true;
            console.log(data);
        });
    }
}]);