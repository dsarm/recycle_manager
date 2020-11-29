@extends('home.master')

@section('title', 'recycles')


@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ trans('recycles.title') }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
    	<div class="col-md-6">
    		
    		<div class="form-group">
    		    <label>{{ trans("recycles.form.location") }}</label>

    		    <div class="input-group">
	    		    <input class="form-control" 
	    		    id="search_location"
	    		    type="text" 
	    		    name="location"
	    		    placeholder="{{ trans('recycles.form.search_location') }}" 
	    		    >
    		    	<div class="input-group-btn">
                		<button id="help_button" type="button" class="btn btn-default" data-toggle="modal" data-target="#helpModal">
                			<span class="glyphicon glyphicon-question-sign"></span>
                		</button>
              		</div>
              	</div>
    		</div>
    		
    	</div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans("recycles.{$mode}") }}
                    
                    <a class="pull-right" style="margin-left:25px" href="{{ route('home.recycles') }}" title="{{ trans('recycles.list') }} ">
                        <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
                    </a>

                    <a id="submit_button" class="pull-right" href="#" title="{{ trans('recycles.form.submit') }}" {{ ($mode == 'create' ? "style=display:none;" : '') }}>
                        <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /.panel-heading -->
                <div id="form_holder" class="panel-body disabledDiv">
                    <form id="recycle_form" role="form" method="post" action="{{ $mode == 'create' ? route('home.recycles.store') : route('home.recycles.update', ['id' => $recycle->id]) }}">
                        {!! csrf_field() !!}

                        <input class="form-control" 
                        id="recycle_id"
                        type="hidden" 
                        name="recycle_id"
                        value="{{ ($mode == 'edit' ? $recycle->id : '') }}" 
                        >

		                <div class="row">

		                	<div class="col-md-2">
		                		
		                		<div class="form-group">
		                		    <label>{{ trans("recycles.form.name") }}*</label>
		                		    <input class="form-control" 
		                		    id="name"
		                		    type="text" 
		                		    name="name"
		                		    placeholder="{{ trans('recycles.form.name') }}" 
		                		    value="{{ ($mode == 'edit' ? $recycle->recycle_info->name : '') }}" 
		                		    >
		                		</div>

		                	</div>

		                	<div class="col-md-4">
		                		
		                		<div class="form-group">
		                		    <label>{{ trans("recycles.form.description") }}</label>
		                		    <input class="form-control" 
		                		    id="description"
		                		    type="text" 
		                		    name="description"
		                		    placeholder="{{ trans('recycles.form.description') }}" 
		                		    value="{{ ($mode == 'edit' ? $recycle->recycle_info->description : '') }}" 
		                		    >
		                		</div>
		                		
		                	</div>

		                	<div class="col-md-2">
		                		
		                        <div id="recycle_type_holder" class="form-group">
		                            <label>{{ trans("recycles.form.type") }}*</label>

		                            <select id="select_recycle_type" name="recycle_type_id[]" class="selectpicker form-group" multiple required>
		                            	@foreach($recycle_types as $recycle_type)
											<option value="{{ $recycle_type->id }}" 
												class="{{ $recycle_type->color }}"
												{{ $mode == 'edit' ? ( $recycle->recycle_type->contains( $recycle_type->id ) ? 'selected' : '' ) : '' }}>
												{{ $recycle_type->name }}
											</option>
										@endforeach
		                            </select>

		                        </div>
		                		
		                	</div>

		                	<div class="col-md-2">
		                		
	                            <div id="recycle_size_holder" class="form-group">
	                                <label>{{ trans("recycles.form.size") }}*</label>

	                                <select id="select_recycle_size" name="recycle_size[]" class="selectpicker form-group" required>
										<option value="small" 
											class="recycle-size-small"
											{{ $mode == 'edit' ? ( $recycle->recycle_info->size == 'small' ? 'selected' : '' ) : '' }}>
											Small
										</option>
										<option value="medium" 
											class="recycle-size-medium"
											{{ $mode == 'edit' ? ( $recycle->recycle_info->size == 'medium' ? 'selected' : '' ) : '' }}>
											Medium
										</option>
										<option value="big" 
											class="recycle-size-big"
											{{ $mode == 'edit' ? ( $recycle->recycle_info->size == 'big' ? 'selected' : '' ) : '' }}>
											Big
										</option>
										<option value="nolimit" 
											class="recycle-size-nolimit"
											{{ $mode == 'edit' ? ( $recycle->recycle_info->size == 'nolimit' ? 'selected' : '' ) : '' }}>
											No Limit
										</option>
	                                </select>

	                            </div>
		                		
		                	</div>

		                	<div class="col-md-2">

		                		<div class="form-group">
		                		    <label>{{ trans("recycles.form.code") }}</label>
		                		    <input class="form-control" 
		                		    id="code"
		                		    type="text" 
		                		    name="code"
		                		    placeholder="{{ trans('recycles.form.code') }}" 
		                		    value="{{ ($mode == 'edit' ? $recycle->code : '') }}" 
		                		    required
		                		    readonly>
		                		</div>
		                		
		                	</div>



	                	</div>

	                	<div class="row">

	                		<div class="col-md-2">
		                		
		                		<div class="form-group">
		                		    <label>{{ trans("recycles.form.address") }}*</label>
		                		    <input class="form-control" 
		                		    id="address"
		                		    type="text" 
		                		    name="address"
		                		    placeholder="{{ trans('recycles.form.address') }}" 
		                		    value="{{ ($mode == 'edit' ? $recycle->recycle_location->address : '') }}" 
		                		    required
		                		    >
		                		</div>

	                		</div>

	                		<div class="col-md-1">

	                			<div class="form-group">
	                			    <label>{{ trans("recycles.form.lat") }}*</label>
	                			    <input class="form-control" 
	                			    id="lat"
	                			    type="text" 
	                			    name="lat"
	                			    placeholder="{{ trans('recycles.form.lat') }}" 
	                			    value="{{ ($mode == 'edit' ? $recycle->recycle_location->lat : '') }}" 
	                			    required
	                			    readonly>
	                			</div>

                			</div>

	                		<div class="col-md-1">

	                			<div class="form-group">
	                			    <label>{{ trans("recycles.form.lng") }}*</label>
	                			    <input class="form-control" 
	                			    id="lng"
	                			    type="text" 
	                			    name="lng"
	                			    placeholder="{{ trans('recycles.form.lng') }}" 
	                			    value="{{ ($mode == 'edit' ? $recycle->recycle_location->lng : '') }}" 
	                			    required
	                			    readonly>
	                			</div>
	                			
	            			</div>

    			    		<div class="col-md-1">

    			    			<div class="form-group">
    			    			    <label>{{ trans("recycles.form.pitch") }}*</label>
    			    			    <input class="form-control" 
    			    			    id="pitch"
    			    			    type="text" 
    			    			    name="pitch"
    			    			    placeholder="{{ trans('recycles.form.pitch') }}" 
    			    			    value="{{ ($mode == 'edit' ? $recycle->recycle_location->pitch : '') }}" 
    			    			    required
    			    			    readonly>
    			    			</div>
    			    			
    						</div>

				    		<div class="col-md-1">

				    			<div class="form-group">
				    			    <label>{{ trans("recycles.form.heading") }}*</label>
				    			    <input class="form-control" 
				    			    id="heading"
				    			    type="text" 
				    			    name="heading"
				    			    placeholder="{{ trans('recycles.form.heading') }}" 
				    			    value="{{ ($mode == 'edit' ? $recycle->recycle_location->heading : '') }}" 
				    			    required
				    			    readonly>
				    			</div>
				    			
							</div>

							<div class="col-md-2">

								<div class="form-group">
								    <label>{{ trans("recycles.form.postal_code") }}*</label>
								    <input class="form-control" 
								    id="postal_code"
								    type="text" 
								    name="postal_code"
								    placeholder="{{ trans('recycles.form.postal_code') }}" 
								    value="{{ ($mode == 'edit' ? $recycle->recycle_location->postal_code : '') }}" 
								    required
								    >
								</div>

							</div>

							<div class="col-md-2">

								<div class="form-group">
								    <label>{{ trans("recycles.form.city") }}*</label>
								    <input class="form-control" 
								    id="city"
								    type="text" 
								    name="city"
								    placeholder="{{ trans('recycles.form.city') }}" 
								    value="{{ ($mode == 'edit' ? ( isset($recycle->recycle_location->city) ? $recycle->recycle_location->city : '' ) : '') }}" 
								    required
								    >
								</div>

							</div>

							<div class="col-md-2">

								<div class="form-group">
								    <label>{{ trans("recycles.form.country") }}*</label>
								    <input class="form-control" 
								    id="country"
								    type="text" 
								    name="country"
								    placeholder="{{ trans('recycles.form.country') }}" 
								    value="{{ ($mode == 'edit' ? ( isset($recycle->recycle_location->country) ? $recycle->recycle_location->country : '' ) : '' ) }}" 
								    required
								    >
								</div>

							</div>

                		</div>

                		<div class="row">
	                		
	                		<div class="col-md-12">

                				<label>{{ trans("recycles.form.map") }}</label>
	                			
	                			<div class="form-group">

	                			
		                			<input id="pac-input" class="controls" type="text" placeholder="Search Box">

		                			<div id="map"></div>

		                			<div id="pano"></div>

	                			</div>

	                		</div>
                			
                		</div>

	                    <input type="submit" value="Submit" style="display:none;">

                	</form>

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>
<!-- /#page-wrapper -->

@endsection

{{-- Inline scripts --}}
@section('scripts')
@parent

<script src="{{ URL::asset('bower_components/jquery-ui/jquery-ui.min.js') }}"></script>

<script src="https://maps.googleapis.com/maps/api/js?key={{$google_maps_api_key->value}}&libraries=places&callback=initAutocomplete"
     async defer></script>


<script defer >

	function initAutocomplete() {

	   	console.log("Script loaded but not necessarily executed.");

	   	var recycleLatlng = new google.maps.LatLng( 
	   		{{ $mode == 'edit' ? $recycle->recycle_location->lat . ', ' .  $recycle->recycle_location->lng : $google_maps_center_point->value }}
	   	);

		map = new google.maps.Map(document.getElementById('map'), {
			center: recycleLatlng,
			zoom: 12,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		});

		panorama = new google.maps.StreetViewPanorama(
			document.getElementById('pano'), 
			{
				position: recycleLatlng,
				pov: {
					heading: 34,
					pitch: 10
				}
			}
		);
        
        map.setStreetView(panorama);

		// Create the search box and link it to the UI element.
		// var input = document.getElementById('pac-input');
		var input = document.getElementById('search_location');
		var searchBox = new google.maps.places.SearchBox(input);
		
		// map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

		// Bias the SearchBox results towards current map's viewport.
		map.addListener('bounds_changed', function() {
			searchBox.setBounds(map.getBounds());
		});

		@if(isset($recycle))

			var recycle = JSON.parse( '{!! json_encode($recycle) !!}' );

			var contentString = createInfoWindow();

			var infowindow = new google.maps.InfoWindow({
				content: contentString
			});

			var marker = new google.maps.Marker({
				map: map,
				title: "{{ $recycle->code }}",
				position: recycleLatlng
		    });

		    marker.addListener('click', function() {
		       infowindow.open(map, marker);
		    });


			markers = [
				marker
			];
			console.log('heading'+recycle.recycle_location.heading);
			console.log('pitch'+recycle.recycle_location.pitch);
			adjustStreetViewMap(
				recycleLatlng, 
				recycle.recycle_location.heading, 
				recycle.recycle_location.pitch
			);

		@endif


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

				// Create a marker for each place.
				var marker = new google.maps.Marker({
					draggable:true,
				    animation: google.maps.Animation.DROP,
					map: map,
					title: place.name,
					position: place.geometry.location
				});

				marker.addListener('dragend', function() {
					console.log(marker.getPosition());

					geocodePosition(
						marker.getPosition()
					);

					adjustStreetViewMap(
						marker.getPosition()
					);
				});


				markers.push(
					marker
				);

				if (place.geometry.viewport) {
					// Only geocodes have viewport.
					bounds.union(place.geometry.viewport);
				} else {
					bounds.extend(place.geometry.location);
				}

				geocodePosition(
					place.geometry.location
				);

				adjustStreetViewMap(
					place.geometry.location
				);

			});

			map.fitBounds(bounds);

		});

		panorama.addListener('pano_changed', function() {
			

	  	});

		panorama.addListener('links_changed', function() {

			console.log('links_changed -  '+panorama.getPosition().lat()+' '+panorama.getPosition().lng());

			adjustMapAndMarker(
				panorama.getPosition()
			);

			geocodePosition(
				panorama.getPosition()
			);
			

		});

		panorama.addListener('position_changed', function() {
			
			$('#heading').val(
				panorama.getPov().heading
			);

			$('#pitch').val(
				panorama.getPov().pitch
			);

		});

		panorama.addListener('pov_changed', function() {
			
			$('#heading').val(
				panorama.getPov().heading
			);

			$('#pitch').val(
				panorama.getPov().pitch
			);
			
		});

	}

	adjustMapAndMarker = function(position) {

		markers[0].setPosition(
			position
		);

		map.panTo(
			position
		);

	};

	adjustStreetViewMap = function(position, heading = 34, pitch = 10) {

		panorama = map.getStreetView();

		panorama.setPosition(
			position
		);

		panorama.setPov(
			(
				{
					heading: parseFloat(
						heading
					),
					pitch: parseFloat(
						pitch
					)
				}
			)
		);

	};

	geocodePosition = function(position) {

		console.log('geocodePosition');

		streetMapViewLat = position.lat();
		streetMapViewLng = position.lng();

		geocoder = new google.maps.Geocoder();
		geocoder.geocode({

		    	latLng: position

			}, 
		    function(results, status) 
		    {
		        if (status == google.maps.GeocoderStatus.OK) 
		        {
		        	loadPositionInfo(results[0]);

		        	console.log(results);
		        } 
		        else 
		        {
		            console.log('Cannot determine address at this location.'+status);
		        }
		    }
		);

	}

	enableForm = function() {
		$("#form_holder").removeClass("disabledDiv");

		$("#submit_button").show();
	}

	loadPositionInfo = function (position) {
		
		var address = position.formatted_address;
		var lat = streetMapViewLat;
		var lng = streetMapViewLng;

		var code = position.place_id;
		var city = '';
		var country = '';
		var postalCode = '';

		for (var i = 0; i < position.address_components.length; i++) {
			
			if( jQuery.inArray( "country", position.address_components[i].types ) > -1 ) {

				country = position.address_components[i].long_name;

			} else if( jQuery.inArray( "locality", position.address_components[i].types )  > -1 ) {

				city = position.address_components[i].long_name;

			} else if( jQuery.inArray( "postal_code", position.address_components[i].types )  > -1 ) {

				postalCode = position.address_components[i].long_name;

			}
			 
		};

		console.log('loadPositionInfo - '+lat+' '+lng);
		console.log('loadPositionInfo - '+city+' '+country+' '+postalCode);

		$("#address").val(address);
		$("#lat").val(lat);
		$("#lng").val(lng);
		$("#code").val(code);
		$("#city").val(city);
		$("#country").val(country);
		$("#postal_code").val(postalCode);

		enableForm();
		
	}

	var panorama;
	var markers = [];
	var map;
	var streetMapViewLat;
	var streetMapViewLng;

	createInfoWindow = function() {

		var recycleTypeHtml = '';
		$.each($(".selectpicker option:selected"), function(){
			recycleTypeHtml += '<span style="padding:0 5px;background-color:'+$(this).attr('class')+'"><b>'+$(this).text()+'</b></span>';

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
										'<th class="info-head">{{ trans("recycles.form.name") }}</th>'+
										'<td class="info-body info-name">'+$('#name').val()+'</td>'+
									'</tr>'+
									'<tr>'+
										'<th class="info-head">{{ trans("recycles.form.type") }}</th>'+
										'<td class="info-body info-type">'+recycleTypeHtml+'</td>'+
									'</tr>'+
									'<tr>'+
										'<th class="info-head">{{ trans("recycles.form.size") }}</th>'+
										'<td class="info-body info-size">'+$('#size').val()+'</td>'+
									'</tr>'+
									'<tr>'+
										'<th class="info-head">{{ trans("recycles.form.address") }}</th>'+
										'<td class="info-body info-address">'+$('#address').val()+'</td>'+
									'</tr>'+
									'<tr>'+
										'<th class="info-head">{{ trans('recycles.form.city') }}</th>'+
										'<td class="info-body info-city">'+$('#city').val()+'</td>'+
									'</tr>'+
									'<tr>'+
										'<th class="info-head">{{ trans('recycles.form.lat') }}</th>'+
										'<td class="info-body info-lat">'+$('#lat').val()+'</td>'+
									'</tr>'+
									'<tr>'+
										'<th class="info-head">{{ trans('recycles.form.lng') }}</th>'+
										'<td class="info-body info-lng">'+$('#lng').val()+'</td>'+
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


<!-- Modal -->
<div class="modal fade" id="helpModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{ trans('recycles.modal.title') }}</h4>
      </div>
      <div class="modal-body">
      	<h5>{{ trans('recycles.modal.sub_title') }}</h5>
      	<ol>
      		<li>{{ trans('recycles.modal.step_1') }}</li>
      		<li>{{ trans('recycles.modal.step_2') }}</li>
      		<li>{{ trans('recycles.modal.step_3') }}</li>
      		<li>{{ trans('recycles.modal.step_4') }}</li>
      		<li>{{ trans('recycles.modal.step_5') }}</li>
      		<li>{{ trans('recycles.modal.step_6') }}</li>
      	</ol>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">{{ trans('recycles.modal.close') }}</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">

	$(function(){
		$('#helpModal').on('shown.bs.modal', function () {
		  $('#myInput').focus()
		})
	});

	$('.selectpicker').selectpicker();

	$('#select_recycle_type').on('change', function() {


	});

	$('#submit_button').on('click', function (evt) {
		evt.preventDefault();

		$('form#recycle_form').find('[type="submit"]').trigger('click');

	});
</script>

{{-- Inline styles --}}
@section('styles')
@parent
<style>

	#map, #pano {
        float: left;
        height: 100%;
        width: 50%;
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
		display: none;
	}

	#pac-input:focus {
		border-color: #4d90fe;
	}

	.pac-container {
		font-family: Roboto;
	}

	#type-selector {
		color: #fff;
		background-color: #4d90fe;
		padding: 5px 11px 0px 11px;
	}

	#type-selector label {
		font-family: Roboto;
		font-size: 13px;
		font-weight: 300;
	}	#target {
		width: 345px;
	}

	div#recycle_type_holder div.bootstrap-select, div#recycle_size_holder div.bootstrap-select {
		width: 100%;
	}

	.recyle_holder {
		cursor: pointer;
	}

	.disabledDiv {
	    pointer-events: none;
	    opacity: 0.4;
	}

	.modal-body h5 {
		font-weight: bold;
	}
</style>
@stop

@stop

