@extends('layouts.app')

@section('content')
    <head>
        <title>How To Use TinyMCE Editor In Laravel ? - NiceSnippets.com</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>
    </head>
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card mx-4">
                <div class="card-body p-4">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf





                        <div class="form-group row">
                            <label for="FirstName" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="FirstName" type="text" class="form-control @error('FirstName') is-invalid @enderror" name="FirstName" value="{{ old('FirstName') }}" required autocomplete="FirstName" autofocus>

                                @error('FirstName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="LastName" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="LastName" type="text" class="form-control @error('LastName') is-invalid @enderror" name="LastName" value="{{ old('LastName') }}" required autocomplete="LastName" autofocus>

                                @error('LastName')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="Business_Name" class="col-md-4 col-form-label text-md-right">{{ __('Business Name') }}</label>

                            <div class="col-md-6">
                                <input id="Business_Name" type="text" class="form-control @error('Business_Name') is-invalid @enderror" name="Business_Name" value="{{ old('Business_Name') }}" required autocomplete="Business_Name" autofocus>

                                @error('Business_Name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>








                        <div class="form-group">
                            <label>Business Description</label>
                            <textarea name="Business_Description" rows="3" cols="5" class="form-control tinymce-editor @error('Business_Description') is-invalid @enderror"></textarea>
                            @error('Business Description')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>






                        <div class="form-group row">
                            <label for="type_id" class="col-md-4 col-form-label text-md-right">{{ __('Business Type') }}</label>

                            <div class="col-md-6">
                                <select id="type_id"  class="form-control select2 @error('type_id') is-invalid @enderror" data-placeholder="Choose Business Type" name="type_id" value="{{ old('type_id') }}" required autocomplete="type_id" autofocus>
                                    <option label="Choose Business Type"></option>

                                    @foreach($business_types as $br)
                                        @if($br->isActive==1)
                                            <option value="{{ $br->id }}">{{ $br->type_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('type_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Business Category') }}</label>

                            <div class="col-md-6">
                                <select id="category_id"  class="form-control select2 @error('category_id') is-invalid @enderror" data-placeholder="Choose Business Category" name="category_id" value="{{ old('category_id') }}" required autocomplete="category_id" autofocus>
                                    <option label="Choose Business Category"></option>


                                    @foreach($business_category as $br)
                                        @if($br->isActive==1)
                                            <option value="{{ $br->id }}">{{ $br->category_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>







                        <div class="form-group row">
                            <label for="Business_NUIS" class="col-md-4 col-form-label text-md-right">{{ __('Business NUIS') }}</label>

                            <div class="col-md-6">
                                <input id="Business_NUIS" type="text" class="form-control @error('Business_NUIS') is-invalid @enderror" name="Business_NUIS" value="{{ old('Business_NUIS') }}" required autocomplete="Business_NUIS" autofocus>

                                @error('Business_NUIS')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="Business_Web" class="col-md-4 col-form-label text-md-right">{{ __('Business Web') }}</label>

                            <div class="col-md-6">
                                <input id="Business_Web" type="text" class="form-control @error('Business_Web') is-invalid @enderror" name="Business_Web" value="{{ old('Business_Web') }}" required autocomplete="Business_Web" autofocus>

                                @error('Business_Web')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="Business_Phone" class="col-md-4 col-form-label text-md-right">{{ __('Business Phone') }}</label>

                            <div class="col-md-6">
                                <input id="Business_Phone" type="text" class="form-control @error('Business_Phone') is-invalid @enderror" name="Business_Phone" value="{{ old('Business_Phone') }}" required autocomplete="Business_Phone" autofocus>

                                @error('Business_Phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>








                        <div class="form-group row">
                            <label for="state_id" class="col-md-4 col-form-label text-md-right">{{ __('Business state ') }}</label>

                            <div class="col-md-6">
                                <select id="state_id"  class="form-control select2 @error('state_id') is-invalid @enderror" data-placeholder="Choose State" name="state_id" value="{{ old('state_id') }}" required autocomplete="state_id" autofocus>
                                    <option label="Choose State"></option>

                                    @foreach($state as $br)

                                        <option value="{{ $br->id }}">{{ $br->state_name }}</option>

                                    @endforeach
                                </select>
                                @error('state_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>





                        <div class="form-group row">
                            <label for="city_id" class="col-md-4 col-form-label text-md-right">{{ __('Business City') }}</label>

                            <div class="col-md-6">
                                <select id="city_id"  class="form-control select2 @error('city_id') is-invalid @enderror" data-placeholder="Choose City" name="city_id" value="{{ old('city_id') }}" required autocomplete="city_id" autofocus>
                                    <option label="Choose City"></option>


                                </select>
                                @error('city_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>





                        <div class="row field-row">
                            <div class="col-xs-12 col-sm-6">
                                <input hidden class="form-control" type="hidden" name="latitude" id="latitude" readonly>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <input hidden class="form-control" type="hidden" name="longtitude" id="longtitude" readonly >
                            </div>
                        </div><!-- /.field-row -->
                        <br>
                        <input id="pac-input" class="controls" class="form-control m-input" type="text" placeholder="Search Box">
                        <div class="container" id="locationMap" style="height:300px; width: 500px"></div>





                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('select[name="state_id"]').on('change',function(){
                var state_id = $(this).val();
                if (state_id) {

                    $.ajax({
                        url: "{{ url('/get/city/') }}/"+state_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            var d =$('select[name="city_id"]').empty();
                            $.each(data, function(key, value){

                                $('select[name="city_id"]').append('<option value="'+ value.id + '">' + value.city_name + '</option>');

                            });
                        },
                    });

                }else{
                    alert('danger');
                }

            });
        });

    </script>


    <script>
        var marker1 = false;
        function initAutocomplete1()
        {
            var locationMap = new google.maps.Map(document.getElementById('locationMap'), {
                center: {lat: 41.3275, lng: 19.8187},
                zoom: 13,
                mapTypeId: 'roadmap'
            });

            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
            locationMap.controls[google.maps.ControlPosition.TOP_LEFT].push(input);



            google.maps.event.addListener(locationMap, 'click', function(event) {
                //Get the location that the user clicked.
                var clickedLocation1= event.latLng;
                //If the marker hasn't been added.
                if(marker1 === false){
                    //Create the marker.
                    marker1 = new google.maps.Marker({
                        position: clickedLocation1,
                        map: locationMap,
                        draggable: true //make it draggable
                    });
                    //Listen for drag events!
                    google.maps.event.addListener(marker1, 'dragend', function(event){
                        markerLocation1();
                    });
                } else{
                    //Marker has already been added, so just change its location.
                    marker1.setPosition(clickedLocation1);
                }
                //Get the marker's location.
                markerLocation1();
            });

            // Bias the SearchBox results towards current map's viewport.
            locationMap.addListener('bounds_changed', function() {
                searchBox.setBounds(locationMap.getBounds());
            });

            var markers1 = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                // Clear out the old markers.
                markers1.forEach(function(marker) {
                    marker1.setMap(null);
                });
                markers1 = [];

                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function(place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };

                    // Create a marker for each place.
                    markers1.push(new google.maps.Marker({
                        map: locationMap,
                        icon: icon,
                        title: place.name,
                        position: place.geometry.location
                    }));

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                locationMap.fitBounds(bounds);
            });


            initAutocomplete();
            markerLocation();
        }




        function markerLocation1(){
            //Get location.
            var currentLocation1 = marker1.getPosition();
            //Add lat and lng values to a field that we can save.
            document.getElementById('latitude').value = currentLocation1.lat(); //latitude
            document.getElementById('longtitude').value = currentLocation1.lng(); //longitude
        }


        var marker = false;
        function initAutocomplete() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 41.3275, lng: 19.8187},
                zoom: 13,
                mapTypeId: 'roadmap'
            });

            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);



            google.maps.event.addListener(map, 'click', function(event) {
                //Get the location that the user clicked.
                var clickedLocation = event.latLng;
                //If the marker hasn't been added.
                if(marker === false){
                    //Create the marker.
                    marker = new google.maps.Marker({
                        position: clickedLocation,
                        map: map,
                        draggable: true //make it draggable
                    });
                    //Listen for drag events!
                    google.maps.event.addListener(marker, 'dragend', function(event){
                        markerLocation();
                    });
                } else{
                    //Marker has already been added, so just change its location.
                    marker.setPosition(clickedLocation);
                }
                //Get the marker's location.
                markerLocation();
            });

            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });

            var markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                // Clear out the old markers.
                markers.forEach(function(marker) {
                    marker.setMap(null);
                });
                markers = [];

                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function(place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };

                    // Create a marker for each place.
                    markers.push(new google.maps.Marker({
                        map: map,
                        icon: icon,
                        title: place.name,
                        position: place.geometry.location
                    }));

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }

        function markerLocation(){
            //Get location.
            var currentLocation = marker.getPosition();
            //Add lat and lng values to a field that we can save.
            document.getElementById('lat').value = currentLocation.lat(); //latitude
            document.getElementById('lng').value = currentLocation.lng(); //longitude
        }


    </script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQME12U4JLF1APtXuR45KJFrkZrqxlPH4&libraries=places&callback=initAutocomplete1"
            async defer></script>


    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea.tinymce-editor',
            height: 500,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_css: '//www.tiny.cloud/css/codepen.min.css'
        });
    </script>
@endsection
