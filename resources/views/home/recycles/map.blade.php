@extends('home.master')

@section('title', 'recycles map')

@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ trans('recycles.map') }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                	Recycle map viewer
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                	<div class="content">
                		<input id="pac-input" class="controls" type="text" placeholder="{{ trans('front.seach_box') }}">

                	    <div id="map"></div>
                	</div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>
<!-- /#page-wrapper -->


    <div id="recycle_info_window" style="display:none;">
    	<div class="content">
    		<div class="siteNotice">
    			<div class="bodyContent">
    				<div class="info-window">
    					<div class="col-xs-12" style="padding:0px;padding-right:10px">
    						<h3>{{ trans("recycles.marker.window_title") }}</h3>
    						<table class="#info-ecoponto">
    							<tbody>
    								<tr>
    									<th class="info-head">{{ trans("recycles.form.code") }}</th>
    									<td class="info-body info-code"></td>
    								</tr>
    								<tr>
    									<th class="info-head">{{ trans("recycles.form.type") }}</th>
    									<td class="info-body info-type"></td>
    								</tr>
    								<tr>
    									<th class="info-head">{{ trans("recycles.form.address") }}</th>
    									<td class="info-body info-address"></td>
    								</tr>
    								<tr>
    									<th class="info-head">{{ trans('recycles.form.city') }}</th>
    									<td class="info-body info-city"></td>
    								</tr>
    							</tbody>
    						</table>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
@endsection

    {{-- Inline scripts --}}
    @section('scripts')
    @parent

    <script src="{{ URL::asset('bower_components/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- PACE Plugin JavaScript -->
    <script src="{{ URL::asset('bower_components/PACE/pace.min.js') }}"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key={{$google_maps_api_key->value}}&libraries=places&callback=initAutocomplete"
         async defer></script>


    <script defer >
    // This example adds a search box to a map, using the Google Place Autocomplete
    // feature. People can enter geographical searches. The search box will return a
    // pick list containing a mix of places and predicted search terms.

    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
		


    	function initAutocomplete() {


    	   	console.log("Script loaded but not necessarily executed.");

    	   	var centerLatlng = new google.maps.LatLng( {{ $google_maps_center_point->value }} );

			map = new google.maps.Map(document.getElementById('map'), {
				center: centerLatlng,
				zoom: 11,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			});

			// // Create the search box and link it to the UI element.
			var input = document.getElementById('pac-input');
			var searchBox = new google.maps.places.SearchBox(input);
			map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

			// Bias the SearchBox results towards current map's viewport.
			map.addListener('bounds_changed', function() {
				searchBox.setBounds(map.getBounds());
			});

			var marker = new google.maps.Marker({
				map: map,
				title: 'center',
				position: centerLatlng
			});

			markers = [
				marker
			];


			// Listen for the event fired when the user selects a prediction and retrieve
			// more details for that place.
			searchBox.addListener('places_changed', function() {
				var places = searchBox.getPlaces();

				if (places.length == 0) {
					return;
				}

				// Clear out the old markers.
				resetAllMarkers();

				// For each place, get the icon, name and location.
				var bounds = new google.maps.LatLngBounds();
				places.forEach(function(place) {
					
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
						})
					);

					if (place.geometry.viewport) {
						// Only geocodes have viewport.
						bounds.union(place.geometry.viewport);
					} else {
						bounds.extend(place.geometry.location);
					}
				});

				map.fitBounds(bounds);
			});

			map.addListener('idle', function() {

				resetAllMarkers();

		        position = map.getBounds();

		        var position = {
		            north : position.getNorthEast().lat(),
		            east : position.getNorthEast().lng(),
		            south : position.getSouthWest().lat(),
		            west : position.getSouthWest().lng()
		        };

		        doSearch(position, map);
		    });

		}

		//important to be in this position
		var markers;
		var map;

		doSearch = function(position) {

			Pace.track(function(){
			    $.ajax({
			        url : '{{ route("front.search.recycles") }}',
			        type: "POST",
			        data : {
			        	'north' : position.north,
			        	'east' : position.east,
			        	'south' : position.south,
			        	'west' : position.west
			        },
		        	headers: {
	                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	                },
			        success: function(data, status){
	    
			            if(status === "success") {

		                    updateMarkers(data);

			            }

			        },
			        error: function (jqXHR, status, errorThrown){
			     		console.log(status);
			     		console.log(errorThrown);
			        }
			    });
		    });

		};

		updateMarkers = function(recycles) {

		    return $.each( recycles, function( key, value ) {

		    	addMarker(
		    		value
	    		);
		        
		    });

		};

		addMarker = function (recycle) {
			
	        var position = {
	        	lat: parseFloat(
	        		recycle.recycle_location.lat
        		), 
        		lng: parseFloat(
        			recycle.recycle_location.lng
    			)};

	        var marker = new google.maps.Marker({
	            position: position,
	            map: map,
	           	title: recycle.code
	        });

	        var contentString = createInfoWindow(
	        	recycle
        	);

	        var infowindow = new google.maps.InfoWindow({
	        	content: contentString
	        });

	        marker.addListener('click', function() {
	        	infowindow.open(map, marker);
	        });

	        markers.push(marker);

		};

		resetAllMarkers = function() {
			markers.forEach(function(marker) {
				marker.setMap(null);
			});

		    return markers = [];
		};

		createInfoWindow = function(value) {

			var recycleTypeHtml = '';
			$.each(value.recycle_type, function(){
				recycleTypeHtml += '<span style="padding:0 5px;background-color:'+$(this)[0].color+'"><b>'+$(this)[0].name+'</b></span>';

			});
			
			return '<div class="content">'+
				'<div class="siteNotice">'+
					'<div class="bodyContent">'+
						'<div class="info-window">'+
							'<div class="col-xs-12" style="padding:0px;padding-right:10px">'+
								'<h3>{{ trans("recycles.marker.window_title") }}</h3>'+
								'<table class="#info-ecoponto">'+
									'<tbody>'+
										'<tr>'+
											'<th class="info-head">{{ trans("recycles.form.code") }}</th>'+
											'<td class="info-body info-code">'+value.code+'</td>'+
										'</tr>'+
										'<tr>'+
											'<th class="info-head">{{ trans("recycles.form.type") }}</th>'+
											'<td class="info-body info-type">'+recycleTypeHtml+'</td>'+
										'</tr>'+
										'<tr>'+
											'<th class="info-head">{{ trans("recycles.form.address") }}</th>'+
											'<td class="info-body info-address">'+value.recycle_location.address+'</td>'+
										'</tr>'+
										'<tr>'+
											'<th class="info-head">{{ trans('recycles.form.city') }}</th>'+
											'<td class="info-body info-city">'+value.recycle_location.city+'</td>'+
										'</tr>'+
										'<tr>'+
											'<th class="info-head">{{ trans('recycles.form.lat') }}</th>'+
											'<td class="info-body info-lat">'+value.recycle_location.lat+'</td>'+
										'</tr>'+
										'<tr>'+
											'<th class="info-head">{{ trans('recycles.form.lng') }}</th>'+
											'<td class="info-body info-lng">'+value.recycle_location.lng+'</td>'+
										'</tr>'+
									'</tbody>'+
								'</table>'+
							'</div>'+
						'</div>'+
					'</div>'+
				'</div>'+
			'</div>';

		}
    </script>


    {{-- Inline styles --}}
    @section('styles')
    @parent
		<style>
			#map {
				height: 100%;
				min-height: 580px;
			}
			.controls {
				margin-top: 10px;
				border: 1px solid transparent;
				border-radius: 2px 0 0 2px;
				box-sizing: border-box;
				-moz-box-sizing: border-box;
				height: 32px;
				outline: none;
				box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
			}

			#pac-input {
				background-color: #fff;
				font-family: Roboto;
				font-size: 15px;
				font-weight: 300;
				margin-left: 12px;
				padding: 0 11px 0 13px;
				text-overflow: ellipsis;
				width: 300px;
			}

			#pac-input:focus {
				border-color: #4d90fe;
			}

			.pac-container {
				font-family: Roboto;
			}

			#target {
				width: 345px;
			}

			.info-body {
				padding-left: 10px;
			}

		</style>
    @stop

@endsection