<div class="row" style="margin-top:30px;" ng-if="metadata.current_location != null">
    <ng-map id="cars-collection-map" center="@{{metadata.current_location.latitude}}, @{{metadata.current_location.longitude}}" zoom="13">
        <info-window id="car-collection-info-window">
            <div ng-non-bindable="" style="overflow-x:hidden">
                <div class="row">
                    <div class="col-sm-12 col-lg-4" >
                        <div style="height:100px;background-image:url('@{{carsCollectionCtrl.api_url + 'img/cars/' + gmap.store.cid}}');background-size:contain;background-repeat:no-repeat;background-position:center center;width:100%"></div>
                    </div>
                    <div style="padding-left:10px;" class="col-sm-12 col-lg-8">
                        <p class="c-title c-font-14 c-font-slim">@{{gmap.store.name}} (@{{gmap.store.transition_mode == 'AUTO' ? 'A/T' : 'M/T'}})</p>
                        <p class="c-price c-font-14 c-font-slim"><span class="c-font-bold">$@{{gmap.store.price}}</span> / day
                        </p>
                        <p class="c-font-14 c-font-slim">@{{(gmap.store.distance || 0) / 1000 | number : 2}} km away</p>
                    </div>
                </div>    
                <div class="row">
                    <div class="col-sm-12 col-lg-6">
                            <a href="javascript:;" ng-click="book('{{url('/cars/book')}}/' + gmap.store.cid)" class="btn btn-lg c-btn-white c-btn-uppercase c-btn-square c-font-grey-3 c-font-white-hover c-bg-red-2-hover c-btn-product">Book Now</a>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                        <a href="{{url('/cars')}}/@{{gmap.store.cid}}?lat=@{{(metadata.current_location || {}).latitude}}&amp;long=@{{(metadata.current_location || {}).longitude}}" class="btn btn-lg c-btn-white c-btn-uppercase c-btn-square c-font-grey-3 c-font-white-hover c-bg-green-2-hover c-btn-product">Details</a>
                    </div>
                </div>                  
            </div>
        </info-window>
        <marker position="[@{{metadata.current_location.latitude}}, @{{metadata.current_location.longitude}}]"
            animation="Animation.BOUNCE" centered="true" title="You Are Here">
        </marker>
        <marker id="car-@{{car.cid}}" ng-repeat="car in cars" 
            ng-if="car.distance === 0 || car.distance"
            position="[@{{car.lat || 0}}, @{{car.long || 0}}]" 
            title="@{{car.name}}"
            animation="Animation.DROP"
            icon="{
                path: 'M45.961,18.702c-0.033-0.038-0.061-0.075-0.1-0.112l-1.717-1.657c1.424-0.323,2.957-1.516,2.957-2.74c0-1.426-1.979-1.932-3.668-1.932c-1.766,0-1.971,1.21-1.992,2.065l-4.43-4.271c-0.9-0.891-2.607-1.592-3.883-1.592H24.5h-0.002h-8.63c-1.275,0-2.981,0.701-3.882,1.592l-4.429,4.271c-0.023-0.855-0.228-2.065-1.992-2.065c-1.691,0-3.669,0.506-3.669,1.932c0,1.224,1.534,2.417,2.958,2.74l-1.717,1.657c-0.039,0.037-0.066,0.074-0.1,0.112C1.2,20.272,0,23.184,0,25.297v6.279c0,1.524,0.601,2.907,1.572,3.938v2.435c0,1.424,1.192,2.585,2.658,2.585h3.214c1.466,0,2.657-1.159,2.657-2.585v-0.623h14.397H24.5h14.396v0.623c0,1.426,1.19,2.585,2.658,2.585h3.213c1.467,0,2.657-1.161,2.657-2.585v-2.435c0.972-1.031,1.572-2.414,1.572-3.938v-6.279C48.998,23.184,47.798,20.272,45.961,18.702z M13.613,11.953c0.623-0.519,1.712-0.913,2.255-0.913h8.63H24.5h8.63c0.543,0,1.632,0.394,2.255,0.913l5.809,5.63H24.5h-0.002H7.805L13.613,11.953z M1.993,24.347c0-1.546,1.21-2.801,2.704-2.801c1.493,0,6.372,2.864,6.372,4.41s-4.879,1.188-6.372,1.188C3.203,27.144,1.993,25.894,1.993,24.347z M10.102,34.573H9.587H9.072l-3.055,0.005c-0.848-0.264-1.446-0.572-1.869-0.903c-0.214-0.167-0.378-0.341-0.506-0.514c-0.129-0.175-0.223-0.347-0.284-0.519c-0.38-1.074,0.405-2.061,0.405-2.061h5.214l3.476,3.99L10.102,34.573L10.102,34.573z M31.996,34.575H24.5h-0.002h-7.496c-1.563,0-2.832-1.269-2.832-2.831h10.328H24.5h10.328C34.828,33.308,33.559,34.575,31.996,34.575z M32.654,29.812H24.5h-0.002h-8.154c-1.7,0-3.08-2.096-3.08-4.681h11.234H24.5h11.234C35.734,27.717,34.354,29.812,32.654,29.812z M45.641,32.644c-0.062,0.172-0.156,0.344-0.285,0.518c-0.127,0.173-0.291,0.347-0.506,0.514c-0.422,0.331-1.021,0.641-1.869,0.903l-3.055-0.005h-0.515h-0.515h-2.353l3.478-3.99h5.213C45.234,30.583,46.02,31.568,45.641,32.644z M44.301,27.144c-1.492,0-6.371,0.356-6.371-1.188s4.879-4.41,6.371-4.41c1.494,0,2.704,1.255,2.704,2.801C47.005,25.892,45.795,27.144,44.301,27.144z',
                fillColor: 'black',
                fillOpacity: 0.8,
                scale: 1,
                strokeColor: 'black',
                strokeWeight: 1
            }"
            on-click="vm.showStore(event, car)">
        </marker>
    </ng-map>
</div>