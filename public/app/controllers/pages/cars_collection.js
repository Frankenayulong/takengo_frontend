app.controller('carsCollectionController', ['$scope', '$rootScope', '$http', 'ENV', '$location', 'NgMap', 'mapboxglMapsData', function($scope, $rootScope, $http, ENV, $location, NgMap, mapboxglMapsData){
    console.log('Going to Cars Collection Page')
    let params = $location.search();
    let page = 1;
    if (params.hasOwnProperty('page') && !isNaN(params.page)){
        page = params.page
    }
    var addMarker = () => {
        $scope.glMap.sources[0].data.features.push({
            type: 'Feature',
            properties: {
                "description": "<p><a href=\"http://www.mtpleasantdc.com/makeitmtpleasant\" target=\"_blank\" title=\"Opens in a new window\">Make it Mount Pleasant</a> is a handmade and vintage market and afternoon of live entertainment and kids activities. 12:00-6:00 p.m.</p>",
            },
            geometry: {
                type: 'Point',
                coordinates: [$rootScope.metadata.current_location.longitude, $rootScope.metadata.current_location.latitude]
            }
        });
        $scope.glMap.sources[0].data.features.push({
            type: 'Feature',
            geometry: {
                type: 'Point',
                coordinates: [$rootScope.metadata.current_location.longitude, $rootScope.metadata.current_location.latitude]
            }
        });
        // $scope.testSources = [
        //     {
        //               "id": "places",
        //               "type": "geojson",
        //               "data": {
        //                   "type": "FeatureCollection",
        //                   "features": [{
        //                       "type": "Feature",
        //                       "properties": {
        //                           "description": "<strong>Make it Mount Pleasant</strong><p><a href=\"http://www.mtpleasantdc.com/makeitmtpleasant\" target=\"_blank\" title=\"Opens in a new window\">Make it Mount Pleasant</a> is a handmade and vintage market and afternoon of live entertainment and kids activities. 12:00-6:00 p.m.</p>",
        //                           "icon": "theatre"
        //                       },
        //                       "geometry": {
        //                           "type": "Point",
        //                           "coordinates": [$rootScope.metadata.current_location.longitude, $rootScope.metadata.current_location.latitude]
        //                       }
        //                   }]
        //               }
        //           }
        //   ];
        console.log($scope.glMap.sources[0])
        $scope.digest()
    }

    var addCarMarker = (lat = 0, long = 0, car = null) => {
        $scope.glMap.sources[1].data.features.push({
            type: 'Feature',
            properties: {
                "description": "<p><a href=\"http://www.mtpleasantdc.com/makeitmtpleasant\" target=\"_blank\" title=\"Opens in a new window\">Make it Mount Pleasant</a> is a handmade and vintage market and afternoon of live entertainment and kids activities. 12:00-6:00 p.m.</p>",
                "icon": "car"
            },
            geometry: {
                type: 'Point',
                coordinates: [long, lat]
            }
        });
    }
    $scope.$on('mapboxglMap:load', (event, GLEvent)=>{
        
    })
    
    $scope.glLayers = [{
        "id": "places",
        "type": "circle",
        "source":"places",
        "paint": {
            'circle-radius': 8,
            'circle-color': '#FF620D'
         },
        popup: {
          enabled: true,
          onClick: {
            message: '${description}'
          }
        }
      },
      {
        "id": "cars",
        "type": "symbol",
        "source":"cars",
        "layout": {
          "icon-image": "{icon}-15",
          "icon-allow-overlap": true
        },
        popup: {
          enabled: true,
          onClick: {
            message: '${description}'
          }
        }
      }];

    $scope.glMap = {
        sources: [
            {
                id: 'places',
                type: 'geojson',
                data: {
                    type: 'FeatureCollection',
                    features: []
                }
            },
            {
                id: 'cars',
                type: 'geojson',
                data: {
                    type: 'FeatureCollection',
                    features: []
                }
            }
        ]
    }

    $scope.map = null;
    NgMap.getMap().then(function(map) {
        console.log(map)
        $scope.map = map;
    }).catch(err => {
        console.log(err)
    });

    console.log("RETRIEVED PARAMS", params);
    $scope.cars = [];
    $scope.carsLocations = [
        //e.g. [lat, long]
    ]

    var reset_cars = () => {
        $scope.cars = [];
        $scope.carsLocations = [];
    }
    $scope.carsCollectionCtrl = {
        loading:{
            retrieve: true
        },
        error: {
            retrieve: false,
            message: {
                retrieve: []
            }
        },
        current_page: page,
        last_page: 0,
        pagination: {
            next: false,
            prev: false
        },
        api_url: ENV.API_URL
    }

    var location_unregister = $scope.$watch('metadata.current_location_retrieved', function(newVal, oldVal){
        if(newVal != oldVal && newVal === true){
            $scope.retrieve();
            addMarker();
            location_unregister();
        }
    })

    var reset_error = () => {
        $scope.carsCollectionCtrl.error.retrieve = false;
        $scope.carsCollectionCtrl.error.message.retrieve = [];
    }

    $scope.changePage = (page = 1) => {
        if(page > $scope.carsCollectionCtrl.last_page){
            page = $scope.carsCollectionCtrl.last_page;
        }else if(isNaN(page)){
            page = 1;
        }
        $scope.carsCollectionCtrl.current_page = page;
        if(page != $scope.carsCollectionCtrl.current_page){
            $location.search('page', $scope.carsCollectionCtrl.current_page);
            $scope.retrieve();
        }else{
            console.log("It's the same page!");
        }
    }

    $scope.retrieve = () => {
        var parsedParams = parseParams();
        $scope.carsCollectionCtrl.loading.retrieve = true;
        console.log('RETRIEVING CARS');
        console.log('GET URL: ', ENV.API_URL + 'cars?' + parsedParams);
        reset_cars();
        $http.get(ENV.API_URL + 'cars?' + parsedParams)
        .then((data)=>{
            console.log(data.data); 
            let response = data.data;
            $scope.cars = response.data;
            $scope.carsCollectionCtrl.last_page = response.last_page;
            $scope.carsCollectionCtrl.current_page = response.current_page;
            $scope.carsCollectionCtrl.pagination.next = response.next_page_url !== null;
            $scope.carsCollectionCtrl.pagination.prev = response.prev_page_url !== null;
            $scope.cars.forEach((obj)=>{
                if(obj.distance !== null){
                    $scope.carsLocations.push([obj.lat, obj.long])
                    addCarMarker(obj.lat, obj.long, obj);
                }
            })
            reset_error();
            $scope.carsCollectionCtrl.loading.retrieve = false;
            if($scope.carsCollectionCtrl.last_page < $scope.carsCollectionCtrl.current_page){
                $scope.carsCollectionCtrl.current_page = $scope.carsCollectionCtrl.last_page;
                $location.search('page', $scope.carsCollectionCtrl.last_page)
                $scope.retrieve()
            }
            $scope.digest();
        }, (data)=>{
            console.log(data)
            let response = data.data;
            $scope.carsCollectionCtrl.error.retrieve = true;
            $scope.carsCollectionCtrl.error.message.retrieve = ['Error fetching cars'];
            $scope.carsCollectionCtrl.loading.retrieve = false;
            $scope.digest();
        });
    }

    var parseParams = () => {
        var p = "";
        var pCount = 0;
        p += ("page=" + $scope.carsCollectionCtrl.current_page);
        pCount++;
        if($rootScope.metadata.current_location !== null){
            if(pCount > 0){
                p += "&";
            }
            p += ("lat="+$rootScope.metadata.current_location.latitude);
            p += "&";
            p += ("long="+$rootScope.metadata.current_location.longitude);
            pCount++;
        }
        return p;
    }
}]);