function load_map_info() {


    var map;
    var markersArray = [];
    var locations = [];

    var geo_pos;

    initialize_map();
    var pos;

    $('#city').change(change_city)
    $('#type').change(change_type)
    $('#city').change(change_city)

    function initialize_map() {
        var styles =
            [
                {
                    "featureType": "administrative.locality",
                    "elementType": "all",
                    "stylers": [
                        {
                            "hue": "#2c2e33"
                        },
                        {
                            "saturation": 7
                        },
                        {
                            "lightness": 19
                        },
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "administrative.locality",
                    "elementType": "labels.text",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "saturation": "-3"
                        }
                    ]
                },
                {
                    "featureType": "administrative.locality",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#f39247"
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "all",
                    "stylers": [
                        {
                            "hue": "#ffffff"
                        },
                        {
                            "saturation": -100
                        },
                        {
                            "lightness": 100
                        },
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "all",
                    "stylers": [
                        {
                            "hue": "#ffffff"
                        },
                        {
                            "saturation": -100
                        },
                        {
                            "lightness": 100
                        },
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "poi.school",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#f39247"
                        },
                        {
                            "saturation": "0"
                        },
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "hue": "#ff6f00"
                        },
                        {
                            "saturation": "100"
                        },
                        {
                            "lightness": 31
                        },
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#f39247"
                        },
                        {
                            "saturation": "0"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels",
                    "stylers": [
                        {
                            "hue": "#008eff"
                        },
                        {
                            "saturation": -93
                        },
                        {
                            "lightness": 31
                        },
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "color": "#f3dbc8"
                        },
                        {
                            "saturation": "0"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "labels",
                    "stylers": [
                        {
                            "hue": "#bbc0c4"
                        },
                        {
                            "saturation": -93
                        },
                        {
                            "lightness": -2
                        },
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "labels.text",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "hue": "#e9ebed"
                        },
                        {
                            "saturation": -90
                        },
                        {
                            "lightness": -8
                        },
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "all",
                    "stylers": [
                        {
                            "hue": "#e9ebed"
                        },
                        {
                            "saturation": 10
                        },
                        {
                            "lightness": 69
                        },
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "all",
                    "stylers": [
                        {
                            "hue": "#e9ebed"
                        },
                        {
                            "saturation": -78
                        },
                        {
                            "lightness": 67
                        },
                        {
                            "visibility": "simplified"
                        }
                    ]
                }
            ];
        var styledMap = new google.maps.StyledMapType(styles,
            {name: "Styled Map"});

        var mapOptions = {
            zoom: 6,
            center: new google.maps.LatLng(15.281396,
                44.192741),
            streetViewControl: true,
            scrollwheel: false,
            zoomControl: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.LARGE
            },
            mapTypeControlOptions: {
                mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
            }
        };
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        // map.mapTypes.set('map_style', styledMap);
        // map.setMapTypeId('map_style');

        get_results(map, "all");



    }

    function get_results(map, link) {


        $.ajax({

            url: "/locations" + link,

            context: document.body,
            success: function (location) {
                for (i = 0; i < location.length; i++) {
                    var obj = [];
                    obj[0] = location[i]['location_name_ar'];
                    obj[1] = location[i]['desc_ar'];
                    obj[2] = location[i]['phone'];
                    obj[3] = location[i]['location_type'];
                    obj[4] = location[i]['lat'];
                    obj[5] = location[i]['lng'];
                    obj[6] = location[i]['icon'];
                    obj[7] = location[i]['email'];
                    locations.push(obj);
                }
                $(this).addClass("done");
                var table_content = "";
                for (i = 0; i < locations.length; i++) {
                    table_content += '<li class="location">';
                    // table_content += '<img src="/uploads/locations_types/';
                    // table_content += locations[i][6];
                    // table_content += '" />';
                    table_content += "<h4>";
                    table_content += locations[i][0];
                    table_content += "</h4>";
                    table_content += "<address>";
                    table_content += "<p>";
                    table_content += locations[i][1];
                    table_content += "</p>";
                    table_content += "<a class='ltr' href='tel:'+locations[i][2]+'>";
                    table_content += locations[i][2];
                    table_content += "</a>";
                    table_content += "<a class='ltr' href='tel:'+locations[i][2]+'>";
                    table_content += locations[i][7];
                    table_content += "</a>";
                    table_content += "</address>";
                    table_content += "</li>";
                }
                $('#results ul').html(table_content);



                var marker, i, current_marker;
                for (i = 0; i < locations.length; i++) {
                    var icon = {
                        url: '/uploads/locations_types/' + locations[i][6], // url
                        scaledSize: new google.maps.Size(35, 35), // scaled size
                        origin: new google.maps.Point(0,0), // origin
                        anchor: new google.maps.Point(0, 0) // anchor
                    };
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i][4], locations[i][5]),
                        //map: map,
                        icon: icon,
                        draggable: false,
                        animation: google.maps.Animation.DROP,
                    });
                    markersArray.push(marker);


                    google.maps.event.addListener(marker, 'click', (function (marker, i) {
                        return function () {
                            map.setZoom(12);
                            latlng = this.getPosition();
                            map.panTo(this.getPosition());
                            current_marker = i;
                            for (var j = 0; j < locations.length; j++) {
                                var icon = {
                                    url: '/uploads/locations_types/' + locations[j][6], // url
                                    scaledSize: new google.maps.Size(35, 35), // scaled size
                                    origin: new google.maps.Point(0,0), // origin
                                    anchor: new google.maps.Point(0, 0) // anchor
                                };
                                markersArray[j].setIcon(icon);
                            }
                            var icon2 = {
                                url: '/uploads/locations_types/branch-pin-yellow.png', // url
                                scaledSize: new google.maps.Size(50, 50), // scaled size
                                origin: new google.maps.Point(0,0), // origin
                                anchor: new google.maps.Point(0, 0) // anchor
                            };
                            markersArray[i].setIcon(icon2);
                            $('#results li ').removeClass('active');
                            $('#results li').eq(i).addClass('active');
                            $('#results li address').slideUp(300).removeClass('active');
                            $('#results li').eq(i).children('address').slideDown(300).addClass('active');
                            // $('#results').animate({
                            //     scrollTop: $('#results li.active').offset().top -30
                            // }, 1000);

                            $('#results li.active').animate({
                                scrollTop: 0
                            }, 'slow');

                        }
                        toggleBounce();
                    })(marker, i));

                    function toggleBounce() {
                        if (marker.getAnimation() != null) {
                            marker.setAnimation(null);
                        } else {
                            marker.setAnimation(google.maps.Animation.BOUNCE);
                        }
                    }
                }
                $('#results .location').click(function () {
                    i = $(this).index();
                    google.maps.event.trigger(markersArray[i], 'click')
                    for (var j = 0; j < locations.length; j++) {
                        var icon = {
                            url: '/uploads/locations_types/' + locations[j][6], // url
                            scaledSize: new google.maps.Size(35, 35), // scaled size
                            origin: new google.maps.Point(0,0), // origin
                            anchor: new google.maps.Point(0, 0) // anchor
                        };
                        markersArray[j].setIcon(icon);
                    }
                    var icon2 = {
                        url: '/uploads/locations_types/branch-pin-yellow.png' , // url
                        scaledSize: new google.maps.Size(50, 50), // scaled size
                        origin: new google.maps.Point(0,0), // origin
                        anchor: new google.maps.Point(0, 0) // anchor
                    };
                    markersArray[i].setIcon(icon2);


                });
                i = 0
                function addPin() {
                    if (i < markersArray.length) {
                        markersArray[i].setMap(map);
                        i++
                        setTimeout(addPin, 300)
                    }
                }

                setTimeout(addPin, 300)

            }
        });

    }


    function clearOverlays() {
        for (var i = 0; i < markersArray.length; i++) {
            markersArray[i].setMap(null);
        }
        $('#results table tbody').empty();
        markersArray.length = 0;
        locations.length = 0;
    }






    function change_city() {
        clearOverlays();
        link = "";

        link += $('#city option:selected').val() + '/' + $('#type option:selected').val();

        if ($(this).val()) {
            map.setCenter(new google.maps.LatLng(parseFloat($('option:selected', this).attr('lat')), parseFloat($('option:selected', this).attr('lng'))));
            get_results(map, link);
            map.setZoom(11);

        }
        else{
            map.setZoom(7);
        }
    }

    function change_city1() {
        clearOverlays();
        link = "";

        link += $('#city option:selected').val() + '/' + $('#type option:selected').val();

        if ($(this).val()) {
            map.setCenter(new google.maps.LatLng(parseFloat($('option:selected', this).attr('lat')), parseFloat($('option:selected', this).attr('lng'))));
            get_results(map, link);
            map.setZoom(11);

        }
        else{
            map.setZoom(7);
        }
    }
    function change_type() {
        clearOverlays();
        $('#results p span').text('');
        link = "";
        link += $('#city option:selected').val() + '/' + $('#type option:selected').val();
        map.setZoom(11);
        get_results(map, link);
    }
}