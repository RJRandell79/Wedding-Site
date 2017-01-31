// Theme JS
jQuery( document ).ready( function( $ ) {
	console.log( 'Ready....!' );

	var weddingtime = 'December 2 2017 12:00:00';
	var headerimageheight = 0;

	// --- Countdown Timer --- //
	function getTimeRemaining( endtime ) {
		var t = Date.parse( endtime ) - Date.parse( new Date() );
		var seconds = Math.floor( ( t / 1000 ) % 60 );
		var minutes = Math.floor( ( t / 1000 / 60 ) % 60 );
		var hours = Math.floor( ( t / ( 1000 * 60 * 60 ) ) % 24 );
		var days = Math.floor( t / ( 1000 * 60 * 60 * 24 ) );

		return {
			'total' : t,
			'days' : days,
			'hours' : hours,
			'minutes' : minutes,
			'seconds' : seconds
		};
	}

	function initializeClock( id, endtime ) {
		var clock = document.getElementById( id );
		var daysSpan = clock.querySelector( '.days' );
		var hoursSpan = clock.querySelector( '.hours' );
		var minutesSpan = clock.querySelector( '.minutes' );
		var secondsSpan = clock.querySelector( '.seconds' );

		function updateClock() {
			var t = getTimeRemaining( endtime );

			daysSpan.innerHTML = t.days;
			hoursSpan.innerHTML = ( '0' + t.hours ).slice( -2 );
			minutesSpan.innerHTML =( '0' + t.minutes ).slice( -2 );
			secondsSpan.innerHTML = ( '0' + t.seconds ).slice( -2 );

			if( t.total <= 0 ) {
				clearInterval( timeinterval );
			}
		}
		updateClock();

		var timeinterval = setInterval( updateClock, 1000 );
	}

	// --- Make Nav Tablet Friendly --- //
    if( $( 'html' ).hasClass( 'touchevents' ) ) {
		$( '.galleryphoto a div' ).css( 'background-color', '#939598' );
		$( '.galleryphoto a div p' ).addClass( 'mobile-gradient' );

		//$( '.directions-form' ).css( 'display', 'none' );

		/*
        $( '.sub-menu' ).hide();
        $( '.nav ul li a' ).removeClass( 'clicked' );

        $( 'li.menu-item a' ).click(function() {

        	$( this ).parent().siblings().find( '.sub-menu' ).css( 'display', 'none' );
        	$( this ).parent().siblings().find( 'a' ).removeClass( 'clicked' );

            if( !$( this ).hasClass( 'clicked' ) ) {
                if( $( this ).parent().find( '.sub-menu' ).first().length >= 1 ) {
                    $( this ).addClass( 'clicked' );
                    event.preventDefault();
                }
                //$( '.sub-menu' ).hide();
                $( this ).parent().find( '.sub-menu' ).first().show();
                event.stopPropagation();
            }
        });
		*/
    }

	/*
	$( '.navbar-toggle' ).click( function() {
		if( $( '.mobile-menu' ).css( 'display' ) === 'block' ) {
			$( '.mobile-menu' ).css( 'display', 'none' );
		} else {
			$( '.mobile-menu' ).css( 'display', 'block' );
		}

	});
	*/

	// --- Sticky nav --- //
	$( document ).on( 'scroll', function() {
		if( $( document ).scrollTop() > headerimageheight ) {
			$( '#navigation' ).addClass( 'fixtop' );
		} else {
			$( '#navigation' ).removeClass( 'fixtop' );
		}
	});

	// --- Scroller --- //
	$( '.scroll-down a' ).click( function( e ) {
		$( 'html, body' ).animate({
			scrollTop: $( '#navigation' ).offset().top
		}, 800 );

		e.preventDefault();
	});

	function screenResized() {
		headerimageheight = $( '.header-images' ).height();
		console.log( 'Screen resized. Header height: ' + headerimageheight );
	}

	$( window ).resize( function() {
		screenResized();
	});
	screenResized();

	if( $( '#countdown' ).length ) {
		initializeClock( 'countdown', weddingtime );
	}
});

// Google maps
if( $( '.map-container' ).length ) {
	google.maps.event.addDomListener( window, 'load', init );
	//var map;
	var churchDestination = new google.maps.LatLng( 53.661496, -2.622937 );
	var receptionDestination = new google.maps.LatLng( 53.744909, -2.601943 );
	var mapOptions = {
		zoom: 14,
		zoomControl: true,
		zoomControlOptions: {
			style: google.maps.ZoomControlStyle.SMALL,
		},
		disableDoubleClickZoom: true,
		mapTypeControl: false,
		mapTypeControlOptions: {
			style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
		},
		scaleControl: false,
		scrollwheel: false,
		panControl: false,
		streetViewControl: false,
		draggable : true,
		overviewMapControl: true,
		overviewMapControlOptions: {
			opened: true,
		},
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		styles:
			[{
				"featureType": "administrative",
				"elementType": "labels",
				"stylers": [{
					"visibility": "off"
			}]
		},
		{
			"featureType": "administrative.country",
			"elementType": "geometry.stroke",
			"stylers": [{
				"visibility": "off"
			}]
		},
		{
			"featureType": "administrative.province",
			"elementType": "geometry.stroke",
			"stylers": [{
				"visibility": "off"
			}]
		},
		{
			"featureType": "landscape",
			"elementType": "geometry",
			"stylers": [{
				"visibility": "on"
			}]
		},
		{
			"featureType": "landscape.natural",
			"elementType": "labels",
			"stylers": [{
				"visibility": "off"
			}]
		},
		{
			"featureType": "road.highway",
			"elementType": "labels.icon",
			"stylers": [{
				"visibility": "off"
			}]
		},
		{
			"featureType": "road",
			"elementType": "labels",
			"stylers": [{
				"visibility": "on"
			},
			{
				"color": "#ffffff"
			}],
			"elementType": "labels.text.fill",
			"stylers": [{
				"color": "#111111"
			}]
		},
		{
			"featureType": "transit",
			"elementType": "labels.icon",
			"stylers": [{
				"visibility": "off"
			}]
		},
		{
			"featureType": "transit.line",
			"elementType": "geometry",
			"stylers": [{
				"visibility": "off"
			}]
		},
		{
			"featureType": "transit.line",
			"elementType": "labels.text",
			"stylers": [{
				"visibility": "off"
			}]
		},
		{
			"featureType": "transit.station.airport",
			"elementType": "geometry",
			"stylers": [{
				"visibility": "off"
			}]
		},
		{
			"featureType": "transit.station.airport",
			"elementType": "labels",
			"stylers": [{
				"visibility": "off"
			}]
		},
		{
			"featureType": "water",
			"elementType": "geometry",
			"stylers": [{
				"color": "#FFFFFF"
			}]
		},
		{
			"featureType": "water",
			"elementType": "labels",
			"stylers": [{
				"visibility": "off"
			}]
		}],
	}

	function init() {

		//if( $( 'html' ).hasClass( 'no-touchevents' ) ) {
			var directionsService = new google.maps.DirectionsService();
			var directionsDisplay = new google.maps.DirectionsRenderer();

			$( '#church-directions' ).submit( function( event ) {
				event.preventDefault();

				var from = $( '#my-church-location' ).val();

				var request = {
					origin: from,
					destination: churchDestination,
					travelMode: google.maps.DirectionsTravelMode.DRIVING
				};

				directionsService.route( request, function( response, status ) {
					if( status == google.maps.DirectionsStatus.OK ) {
						directionsDisplay.setDirections( response );
					}
				});

				var churchMapElement = document.getElementById( 'church-map' );
				var churchMap = new google.maps.Map( churchMapElement );
				churchMap.setOptions( mapOptions );

				directionsDisplay.setMap( churchMap );
				directionsDisplay.setPanel( document.getElementById( 'church-directions-panel' ) );
			});

			$( '#reception-directions' ).submit( function( event ) {
				event.preventDefault();

				var from = $( '#my-reception-location' ).val();

				var request = {
					origin: from,
					destination: receptionDestination,
					travelMode: google.maps.DirectionsTravelMode.DRIVING
				};

				directionsService.route( request, function( response, status ) {
					if( status == google.maps.DirectionsStatus.OK ) {
						directionsDisplay.setDirections( response );
					}
				});

				var receptionMapElement = document.getElementById( 'reception-map' );
				var receptionMap = new google.maps.Map( receptionMapElement );
				receptionMap.setOptions( mapOptions );

				directionsDisplay.setMap( receptionMap );
				directionsDisplay.setPanel( document.getElementById( 'reception-directions-panel' ) );
			});
		// } //hasClass no-touchevents

		var loc;

		$( '.map-container' ).each( function( index, Element ) {

			if( index == 0 ) {
				loc = churchDestination;
			} else {
				loc = receptionDestination;
			}

			var map = new google.maps.Map( Element, mapOptions );
			map.setCenter( loc );
			var markerIcon = new google.maps.MarkerImage( 'http://www.robandlauraswedding.co.uk/wp-content/themes/wedding/dist/img/map-marker.png' );
			var marker = new google.maps.Marker({
				position: loc,
				map: map,
				icon: markerIcon
			});
		});

	}
}
