app.controller('carsBookingController', ['$scope', '$rootScope', '$http', 'ENV', '$location', 'NgMap', '$window', function($scope, $rootScope, $http, ENV, $location, NgMap, $window){
    $scope.$watchGroup(['metadata.signed_in', 'metadata.signing'], function(newVal, oldVal) {
        if(newVal[0] == false && newVal[1] == false){
            $window.location = ENV.BASE_URL;
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
        book_start_date: moment(),
        book_end_date: moment(),
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

    $scope.booking_time = {
        start_time: null,
        end_time: null
    }

    var start_time = new Date((new Date(0,0,0,0,0,0,0)).setHours(((new Date()).getHours() + 1) % 24));
    console.log(start_time)

    $('#end-time').timepicker({
        timeFormat: 'h:mm p',
        interval: 60,
        minTime: '0',
        maxTime: '11:00pm',
        defaultTime: start_time,
        dynamic: true,
        dropdown: true,
        scrollbar: true,
        change: function(time){
            if(!$scope.booking_time.start_time){
                return;
            }
            var hours = time.getHours();
            var minutes = time.getMinutes();
            if(hours < $scope.booking_time.start_time.hours || (hours == $scope.booking_time.start_time.hours && minutes + 30 < $scope.booking_time.start_time.minutes)){
                $('#end-time').timepicker('setTime', new Date(0,0,0,$scope.booking_time.start_time.hours, $scope.booking_time.start_time.minutes + 30))
            }else{
                $scope.booking_time.end_time = {
                    hours: hours,
                    minutes: minutes
                }
                $scope.book_form.book_end_date.hours(hours);
                $scope.book_form.book_end_date.minutes(minutes);
            }
        }
    });

    $('#start-time').timepicker({
        timeFormat: 'h:mm p',
        interval: 60,
        minTime: start_time,
        maxTime: '11:59pm',
        defaultTime: start_time,
        dynamic: true,
        dropdown: true,
        scrollbar: true,
        change: function(time){
            var hours = time.getHours();
            var minutes = time.getMinutes();
            if(hours < start_time.getHours()){
                $('#start-time').timepicker('setTime', start_time);
            }else{
                $scope.booking_time.start_time = {
                    hours: hours,
                    minutes: minutes
                }
                $scope.book_form.book_start_date.hours(hours);
                $scope.book_form.book_start_date.minutes(minutes);
                $scope.digest(_=>{
                    $('#end-time').timepicker().option('minTime', new Date(0,0,0,hours,minutes+30,0,0));
                    $('#end-time').timepicker('setTime', new Date(0,0,0,hours,minutes+30,0,0));
                })
            }
            
        }
    });

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
        req_payload.book_end_date = req_payload.book_end_date.format('DD MMMM YYYY HH:mm:ss')
        req_payload.book_start_date = req_payload.book_start_date.format('DD MMMM YYYY HH:mm:ss')
        $http.post(ENV.API_URL + 'book', req_payload, {
            headers:{
                'X-TKNG-UID': $rootScope.metadata.auth.uid,
                'X-TKNG-TKN': $rootScope.metadata.auth.token,
                'X-TKNG-EM': $rootScope.metadata.auth.email
            }
        })
        .then((data)=>{
            // $scope.book_metadata.loading.booking = false;
            $window.location.href = ENV.BASE_URL + 'history'; 
            console.log(data);
        }, (data)=>{
            $scope.book_metadata.loading.booking = false;
            $scope.book_metadata.error = true;
            console.log(data);
        });
    }
}]);

app.controller('extendModalController', ['$scope', '$rootScope', '$http', 'ENV', function($scope, $rootScope, $http, ENV){
    $scope.$watchGroup(['metadata.signed_in', 'metadata.signing'], function(newVal, oldVal) {
        if(newVal[0] == false && newVal[1] == false){
            //close modal
        }
    });

    $scope.extend_loading = false;
    $scope.extend_error = false;
    $scope.modal_booking_time = {
        end_time: null
    }

    $scope.modal_book_form = {
        book_end_date: moment(),
        cid: '',
        uid: '',
        ohid: ''
    };

    var end_time = new Date((new Date(0,0,0,0,0,0,0)).setHours(((new Date()).getHours() + 1) % 24));
    console.log(end_time)

    var minimum_time = {
        hours: end_time.getHours(),
        minutes: end_time.getMinutes()
    }

    $('#end-time').timepicker({
        timeFormat: 'h:mm p',
        interval: 60,
        minTime: '0',
        maxTime: '11:00pm',
        defaultTime: end_time,
        dynamic: false,
        dropdown: false,
        scrollbar: false,
        change: function(time){
            if(!minimum_time){
                return;
            }
            var hours = time.getHours();
            var minutes = time.getMinutes();
            if(hours < minimum_time.hours || (hours == minimum_time.hours && minutes + 30 < minimum_time.minutes)){
                $('#end-time').timepicker('setTime', new Date(0,0,0,minimum_time.hours, minimum_time.minutes + 30))
            }else{
                $scope.modal_booking_time.end_time = {
                    hours: hours,
                    minutes: minutes
                }
                $scope.modal_book_form.book_end_date.hours(hours);
                $scope.modal_book_form.book_end_date.minutes(minutes);
            }
        }
    });

    $scope.submitExtension = () => {
        console.log($scope.modal_book_form);
        $scope.extend_loading = true;
        var req_payload = Object.assign({}, $scope.modal_book_form);
        req_payload.book_end_date = req_payload.book_end_date.format('DD MMMM YYYY HH:mm:ss')
        $http.post(ENV.API_URL + 'booking/'+req_payload.ohid+'/extend', req_payload, {
            headers:{
                'X-TKNG-UID': $rootScope.metadata.auth.uid,
                'X-TKNG-TKN': $rootScope.metadata.auth.token,
                'X-TKNG-EM': $rootScope.metadata.auth.email
            }
        })
        .then((data)=>{
            console.log(data);
            $scope.extend_loading = false;
            if(data.data.status == 'OK'){
                $scope.extend_error = false;
                $('#extendModal').modal('hide');
            }else{
                $scope.extend_error = true;
            }
            
        }, (data)=>{
            $scope.extend_loading = false;
            $scope.extend_error = true;
            console.log(data);
        });
    }

    $('#extendModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var endDate = button.data('end')
        var uid = button.data('uid');
        var cid = button.data('cid');
        var ohid = button.data('ohid');
        console.log(endDate, uid, cid);
        $scope.modal_book_form.uid = uid;
        $scope.modal_book_form.cid = cid;
        $scope.modal_book_form.ohid = ohid;
        $scope.modal_book_form.book_end_date = moment(endDate, "YYYY-MM-DD HH:mm:ss");
        console.log($scope.modal_book_form)
  });
}]);