<?php
/**
 * Google Maps Section on Front Page
 *
 * @package Osclass
 * @subpackage Classified
 */
?>
<script type="text/javascript" src="https://map.google.com/maps/api/js">
</script>
<style>

</style>
<?php if( osc_count_latest_items() != 0) { ?>
<script type="text/javascript">
jQuery( document ).ready( function($) {
    
    var locations = [];
    <?php while ( osc_has_latest_items()) { ?> 
            name = "<?php echo osc_item_title(); ?>";
            url = "<?php echo osc_item_url(); ?>";
            category = "<?php echo osc_item_category(); ?>";
            address = "<?php echo osc_item_address(); ?>";
            city_area = "<?php echo osc_item_city_area(); ?>";
            city = "<?php echo osc_item_city(); ?>";
            region = "<?php echo osc_item_region(); ?>";
            country = "<?php echo osc_item_country(); ?>";
            <?php if( osc_count_item_resources() ) { ?>
                image = "<?php echo osc_resource_thumbnail_url(); ?>";
                <?php }else{ ?>
                image ="<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>";
            <?php } ?>    
            pub_date = "<?php echo osc_item_pub_date(); ?>";
            lat = "<?php echo osc_item_latitude();?>";
            lon = "<?php echo osc_item_longitude(); ?>";
            var arr = {
                name:name,
                url:url,
                category:category,
                address:address, 
                city_area:city_area,
                city:city,
                region:region,
                country:country,
                image:image,
                pub_date:pub_date,
                lat:lat, 
                lon:lon}; 
            locations.push(arr);
            
    <?php } ?>
    var style = [
          {
            stylers: [
              { hue: "#3e658b" },
              { saturation: -20 }
            ]
          },{
            featureType: "road",
            elementType: "geometry",
            stylers: [
              { lightness: 100 },
              { visibility: "simplified" }
            ]
          },{
            featureType: "road",
            elementType: "labels",
            stylers: [
              { visibility: "on" }
            ]
          }
        ];
    var icon_url = "<?php echo osc_current_web_theme_url()?>"+'images/map-icons/';

    var icons = [
        icon_url + 'default.png',
        ];

    var icons_length = icons.length;

    var shadow = {
        anchor: new google.maps.Point(5, 13),
        url: icon_url + 'map_shadow.png'
    };    


    var map = new google.maps.Map(document.getElementById('classified_maps'), {
        center: new google.maps.LatLng(27.713294, -85.323558),
        mapTypeControl: false,
        streetViewControl: false,
        disableDefaultUI: true,
        zoomControl: true,
        scaleControl: true,
        panControl: true,
        zoom: 5,
        scrollwheel: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles : style,
        zoomControlOptions: {
        position: google.maps.ControlPosition.LEFT_BOTTOM
        }
    });



    var marker;
    var markers = new Array();
    var infowindow = new Array();
    var iconCounter = 0;

    // Add the markers and infowindows to the map
    for (var i = 0; i < locations.length; i++) {
        
        if(locations[i]['lat'] != 0 && locations[i]['lon'] != 0){
            
            infowindow[i] = new google.maps.InfoWindow({
                content : '<div class="auto-mobile">\
                                    <img alt="'+locations[i]['name']+'" class="img-responsive full-screen" src="'+locations[i]['image']+'">\
                                    <div class="info_top">\
                                        <ul class="list-inline">\
                                            <li><h4><a href="'+locations[i]['url']+'">'+locations[i]['name']+'</a></h4></li>\
                                        </ul>\
                                        <ul class="list-inline">\
                                            <li><i class="fa  fa-arrow-circle-right" style="color:#27beaf;"></i></li><li>'+locations[i]['category']+'</li>\
                                        </ul>\
                                        <ul class="list-inline">\
                                            <li><i class="fa fa-map-marker" style="color:#27beaf;"></i></li><li>'+locations[i]['region']+', '+locations[i]['city']+', '+locations[i]['city_area']+', '+locations[i]['address']+'\
                                            </li>\
                                        </ul>\
                                        <ul class="list-inline">\
                                            <li><i class="fa fa-clock-o" style="color:#27beaf;"></i></li><li>'+locations[i]['pub_date']+'\
                                            </li>\
                                        </ul>\
                                        <ul class="list-inline">\
                                            <li><i class="fa fa-eye" style="color:#27beaf;"></i></li><li><a href="'+locations[i]['url']+'">Details</a>\
                                            </li>\
                                        </ul>\
                                    </div>\
                           </div>',
                maxWidth: 400,
                maxHeight: 350
            });
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i]['lat'],locations[i]['lon']),
                map: map,
                icon: icons[iconCounter],
                shadow: shadow
            });
            markers.push(marker);
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    //infowindow.setContent(this.info);
                    infowindow[i].open(map, marker);
                }
            })(marker, i));
            iconCounter++;
            // We only have a limited number of possible icon colors, so we may have to restart the counter
            if (iconCounter >= icons_length) {
                iconCounter = 0;
            }
        }
    }

    function AutoCenter() {
        //  Create a new viewpoint bound
        var bounds = new google.maps.LatLngBounds();
        // Go through each…
        $.each(markers, function(index, marker) {
            bounds.extend(marker.position);
        });
        // Fit these bounds to the map
        map.fitBounds(bounds);
    }
    AutoCenter();
    
});
</script>
<?php } ?>
<div id="classified_maps" style="width: 100%; height: 480px;"></div>