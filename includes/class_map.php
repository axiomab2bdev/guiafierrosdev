<?php
/**
* Map class handles generation of HTML link or map javascript
*/
class Map {
    /**
    * PMDR Registry
    * @var object
    */
    var $PMDR;
    /**
    * Map service API key
    * @var string
    */
    var $apiKey = '';
    /**
    * Map service API key for geocoding
    * @var string
    */
    var $apiKeyGeocoding = '';
    /**
    * Map DIV ID
    * @var string
    */
    var $mapID = 'map';
    /**
    * Load the map on page load
    * @var boolean
    */
    var $onload = true;
    /**
    * Map center latitude
    * @var float
    */
    var $centerLatitude = null;
    /**
    * Map center longitude
    * @var float
    */
    var $centerLongitude = null;
    /**
    * Display map controls
    * @var boolean
    */
    var $mapControls = true;
    /**
    * Map control size
    * @var string small|large
    */
    var $controlSize = 'small';
    /**
    * Display map control type
    * @var boolean
    */
    var $controlType = true;
    /**
    * Additional CSS styles added to map container
    * @var string
    */
    var $style = '';
    /**
    * Display scale control
    * @var boolean
    */
    var $scaleControl = true;
    /**
    * Display overview control
    * @var boolean
    */
    var $overviewControl = false;
    /**
    * Holds coordinate selector data
    * @var mixed
    */
    var $coordinatesSelector = null;
    /**
    * Zoom level
    * @var int
    */
    var $zoomLevel = 12;
    /**
    * Disable mouse scrolling
    * @var boolean
    */
    var $disableScroll = false;
    /**
    * Alert message in case javascript is disabled
    * @var string
    */
    var $jsAlertMessage = 'The map requires javascript to be enabled.';
    /**
    * Enable popup information window
    * @var boolean
    */
    var $showInfoWindow = true;
    /**
    * Event causing information window to display
    * @var string click|mouseover
    */
    var $showInfoWindowEvent = 'click';
    /**
    * Geocoding service to use
    * @var string google
    */
    var $lookupService = 'google';
    /**
    * List of lookup servers for the lookup service
    * @var array
    */
    var $lookupServers = array('google'=>'maps.googleapis.com');
    /**
    * Markers displayed on the map
    * @var array
    */
    var $markers = array();
    /**
    * Icon images
    * @var array
    */
    var $icons = array();
    /**
    * Auto zoom around all markers
    * @var boolean
    */
    var $autoZoom = true;
    /**
    * Javascript added to the map javascript
    * @var string
    */
    var $script = '';
    /**
    * Maximum longitude displayed
    * @var int
    */
    var $maxLon = -1000000;
    /**
    * Minimum longitude displayed
    * @var int
    */
    var $minLon = 1000000;
    /**
    * Maximum latitude displayed
    * @var int
    */
    var $maxLat = -1000000;
    /**
    * Minimum latitude displayed
    * @var int
    */
    var $minLat = 1000000;

    /**
    * Map Class constructor
    * @param object $PMDR
    * @return void
    */
    function __construct($PMDR) {
        $this->PMDR = $PMDR;
    }

    /**
    * Set zoom level of the map
    * @param int $level
    */
    function setZoomLevel($level) {
        $this->zoomLevel = (int) intval($level);
    }

    /**
    * Set control size
    * @param string $size small or large
    */
    function setControlSize($size) {
        switch($size) {
            case 'small':
                $this->controlSize = 'small';
                break;
            default:
                $this->controlSize = 'large';
                break;
        }
    }

    /**
    * Set map type
    * @param string $type hybrid|satellite|map
    */
    function setMapType($type) {
        switch($type) {
            case 'hybrid':
                $this->mapType = 'G_HYBRID_MAP';
                break;
            case 'satellite':
                $this->mapType = 'G_SATELLITE_MAP';
                break;
            case 'map':
            default:
                $this->mapType = 'G_NORMAL_MAP';
                break;
        }
    }

    /**
    * Set infor window trigger
    * @param string $type mouseover|click
    */
    function setInfoWindowTrigger($type) {
        switch($type) {
            case 'mouseover':
                $this->windowTrigger = 'mouseover';
                break;
            default:
                $this->windowTrigger = 'click';
                break;
        }
    }

    /**
    * Add marker by address
    * @param string $address
    * @param string $city
    * @param string $state
    * @param string $country
    * @param string $zip
    * @param string $title
    * @param string $html
    * @param string $tooltip
    * @return mixed
    */
    function addMarkerByAddress($address, $city, $state, $country, $zip, $title='', $html='', $tooltip='', $label = '', $url = '') {
        if(($geocode = $this->getGeocode($address, $city, $state, $country, $zip)) === false) {
            return false;
        }
        return $this->addMarkerByCoords($geocode['lon'],$geocode['lat'],$title,$html,$tooltip,$label,$url);
    }

    /**
    * Add marker by coordinates
    * @param float $lon
    * @param float $lat
    * @param string $title
    * @param string $html
    * @param string $tooltip
    * @return boolean
    */
    function addMarkerByCoords($lon, $lat, $title='', $html='', $tooltip = '', $label = '', $url = '') {
        $this->markers[] = array('lon'=>$lon,'lat'=>$lat,'html'=>($html != '' ? $html : $title),'title'=>$title,'tooltip'=>$tooltip,'label'=>$label,'url'=>$url);
        $this->adjustCenterCoords($lon,$lat);
        return true;
    }

    /**
    * Adjust center doordinates based on maximum/minimum settings
    * @param float $lon
    * @param float $lat
    * @return boolean
    */
    function adjustCenterCoords($lon,$lat) {
        if(strlen((string)$lon) == 0 OR strlen((string)$lat) == 0) {
            return false;
        }

        $this->maxLon = (float) max($lon, $this->maxLon);
        $this->minLon = (float) min($lon, $this->minLon);
        $this->maxLat = (float) max($lat, $this->maxLat);
        $this->minLat = (float) min($lat, $this->minLat);

        $this->setCenterCoords(($this->minLon + $this->maxLon) / 2,($this->minLat + $this->maxLat) / 2);
        return true;
    }

    /**
    * Set center coordinates
    * @param float $lon
    * @param float $lat
    */
    function setCenterCoords($lon,$lat) {
        $this->centerLatitude = (float) $lat;
        $this->centerLongitude = (float) $lon;
    }

    /**
    * Create marker icon based on image file
    * @param string $image Image file name located in template images folder
    * @param string $image_shadow Shadow image file name located in template images folder
    * @param int $image_x
    * @param int $image_y
    * @param int $window_x
    * @param int $window_y
    */
    function createMarkerIcon($image ,$image_shadow = '',$image_x = '',$image_y = '',$window_x = '',$window_y = '') {
        if(!($image_info = @getimagesize($this->PMDR->get('Templates')->path('images/'.$image)))) {
            if(DEBUG_MODE) {
                trigger_error('createMarkerIcon - Can not read image '.$image_path,E_USER_WARNING);
            }
            return false;
        }
        if($image_shadow) {
            if(!($image_shadow_info = @getimagesize($this->PMDR->get('Templates')->path('images/'.$image_shadow)))) {
                if(DEBUG_MODE) {
                    trigger_error('createMarkerIcon - Can not read image '.$image_shadow_path,E_USER_WARNING);
                }
                return false;
            }
        }

        if($image_x == '') {
            $image_x = (int) ($image_info[0] / 2);
        }
        if($image_y == '') {
            // Set the Y axis to the height of the image since that is where the bottom point is.
            $image_y = (int) $image_info[1];
        }
        if($window_x == '') {
            $window_x = (int) ($image_info[0] / 2);
        }
        if($window_y == '') {
            $window_y = (int) ($image_info[1] / 2);
        }

        $icon = array('image'=>$image,'width'=>$image_info[0],'height'=>$image_info[1],'anchor_x'=>$image_x,'anchor_y'=> $image_y,'window_anchor_x' => $window_x,'window_anchor_y' => $window_y);
        if($image_shadow) {
            $icon['shadow'] =  $image_shadow;
            $icon['shadow_width'] = $image_shadow_info[0];
            $icon['shadow_height'] = $image_shadow_info[1];
        }
        return $icon;
    }

    /**
    * Adds coordinate selector ability to the map
    * @param string $latitude_element
    * @param string $longitude_element
    */
    function addCoordinatesSelector($latitude_element, $longitude_element) {
        $this->coordinatesSelector = array('latitude_element'=>$latitude_element,'longitude_element'=>$longitude_element);
    }

    /**
    * Set marker icon
    * @param string $image
    * @param string $image_shadow
    * @param int $image_x
    * @param int $image_y
    * @param int $window_x
    * @param int $window_y
    */
    function setMarkerIcon($image, $image_shadow = '', $image_x = '', $image_y = '', $window_x = '', $window_y = '') {
        if($icon = $this->createMarkerIcon($image,$image_shadow,$image_x,$image_y,$window_x,$window_y)) {
            $this->icons = $icon;
        }
    }

    /**
    * Add script
    * @param string $script
    */
    function addScript($script) {
        $this->script = $script;
    }

    /**
    * Print the javascript header for the map
    */
    function printHeaderJS() {
        echo $this->getHeaderJS();
    }

    /**
    * Print the map javascript
    */
    function printMapJS() {
        echo $this->getMapJS();
    }

    /**
    * Print the entire map code
    */
    function printMap() {
        echo $this->getMap();
    }

   /**
   * Get coordinates for an address
   * @param string $address
   * @param string $city
   * @param string $state
   * @param string $country
   * @param string $zip
   */
    function getGeocode($address, $city, $state, $country, $zip) {
        return $this->geoGetCoords($address, $city, $state, $country, $zip);
    }

    /**
    * Get coordinates via the lookup service
    * @param string $address
    * @param string $city
    * @param string $state
    * @param string $country
    * @param string $zip
    */
    function geoGetCoords($address, $city, $state, $country, $zip) {
        $address_joined = $address.' '.$city.' '.$state.' '.$country.' '.$zip;
        $coordinates = array();
        switch($this->lookupService) {
            case 'google':
                $url = 'http://'.$this->lookupServers['google'].'/maps/api/geocode/json?address='.rawurlencode($address_joined).'&sensor=false';
                if($result = $this->fetchURL($url)) {
                    $result = json_decode($result,true);
                    if($result['status'] != 'OK') {
                        trigger_error('Google geocoding failed. (Status: '.$result['status'].', Address: '.$address_joined.')',E_USER_WARNING);
                        return false;
                    }
                    $coordinates['lat'] = $result['results'][0]['geometry']['location']['lat'];
                    $coordinates['lon'] = $result['results'][0]['geometry']['location']['lng'];
                } else {
                    trigger_error('Google geocoding failed.  No result. (URL: '.$url,E_USER_WARNING);
                    return false;
                }
                break;
            case 'mapquest':
                $url = 'http://www.mapquestapi.com/geocoding/v1/address?key='.$mapquest_api_key.'&location='.rawurlencode($address_joined);
                if($result = $this->fetchURL($url)) {
                    $result = json_decode($result,true);
                    if($result['info']['statuscode'] == 0 AND count($result['results'][0]['locations'])) {
                        $coordinates['lon'] = $result['results'][0]['locations'][0]['latLng']['lng'];
                        $coordinates['lat'] = $result['results'][0]['locations'][0]['latLng']['lat'];
                    } else {
                        trigger_error('Mapquest geocoding failed.  No result. (Result: '.$result,E_USER_WARNING);
                        return false;
                    }
                } else {
                    trigger_error('Mapquest geocoding failed.  No result. (URL: '.$url,E_USER_WARNING);
                    return false;
                }
                break;

        }
        return $coordinates;
    }

    /**
    * Get results from a URL
    * @param string $url
    * @return string
    */
    function fetchURL($url) {
        // Will fail if too many requests (620 error)
        if(!$content = @file_get_contents($url)) {
            $http_request = $this->PMDR->get('HTTP_Request');
            $http_request->settings[CURLOPT_RETURNTRANSFER] = true;
            $http_request->settings[CURLOPT_HEADER] = false;
            $content = $http_request->get('curl',$url);
        }
        return $content;
    }

    /**
    * Get the distance between two points
    * @param float $lat1
    * @param float $lon1
    * @param float $lat2
    * @param float $lon2
    * @param string $unit miles|kilometers|nautical|feet|inches
    */
    function geoGetDistance($lat1, $lon1, $lat2, $lon2, $unit='miles') {
        $miles =  69.09 * rad2deg(acos(sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($lon1 - $lon2))));

        switch(strtoupper($unit)) {
            case 'kilometers':
                return $miles * 1.609344;
                break;
            case 'nautical':
                return $miles * 0.868976242;
                break;
            case 'feet':
                return $miles * 5280;
                break;
            case 'inches':
                return $miles * 63360;
                break;
            case 'miles':
            default:
                return $miles;
                break;
        }
    }
}

/**
* Google Map subclass
*/
class Google_Map extends Map {
    /**
    * Map type
    * @var string G_NORMAL_MAP|G_SATELLITE_MAP|G_HYBRID_MAP
    */
    var $mapType = 'G_NORMAL_MAP';

    /**
    * Get map header JS
    * @return string
    */
    function getHeaderJS() {
        return '<script src="http'.(SSL_ON ? 's' : '').'://maps.google.com/maps/api/js?v=3.1&amp;sensor=false&amp;language='.preg_replace('/\-.+/','',$this->PMDR->getLanguage('languagecode')).'" type="text/javascript" charset="utf-8"></script>';
    }

    /**
    * Get Map javascript
    * @return string
    */
    function getMapJS() {
        $this->setMarkerIcon('icon_google_map.png','icon_google_map_shadow.png');

        $_output = '<script type="text/javascript" charset="utf-8">'."\n";
        $_output .= '//<![CDATA['."\n";
        $_output .= 'var map = null;'."\n";

        if($this->onload) {
           $_output .= 'function mapOnLoad() {' . "\n";
        }

        $_output .= '
        var GoogleMap_Options = {
            navigationControl: true,
            navigationControlOptions: {';
                if($this->controlSize == 'large') {
                    $_output .= 'style: google.maps.NavigationControlStyle.ZOOM_PAN';
                } elseif($this->controlSize == 'small') {
                    $_output .= 'style: google.maps.NavigationControlStyle.SMALL';
                } else {
                    $_output .= 'style: google.maps.NavigationControlStyle.DEFAULT';
                }
            $_output .= '},';

            if($this->disableScroll) {
                $_output .= 'scrollwheel: false,';
            }

            if($this->controlType) {
                $_output .= '
                    mapTypeControl: true,
                    mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
                ';
            }
            if($this->scaleControl) {
                $_output .= 'scaleControl: true,';
            }
            $_output .= 'zoom: '.$this->zoomLevel.',';

            if(isset($this->centerLatitude) AND isset($this->centerLongitude)) {
                $_output .= 'center: new google.maps.LatLng('.number_format($this->centerLatitude,6,".", "").', '.number_format($this->centerLongitude,6,".","").'),';
            }

            $_output .= 'mapTypeId: google.maps.MapTypeId.ROADMAP';
        $_output .= '};';
        $_output .= 'mapObj = document.getElementById("'.$this->mapID.'");';
        $_output .= 'if(mapObj != "undefined" && mapObj != null) {';
        $_output .= 'map = new google.maps.Map(mapObj,GoogleMap_Options);';

        if(is_array($this->icons) AND count($this->icons) > 0) {
            $_output .= '
                var icon_image = new google.maps.MarkerImage(
                    "'.$this->PMDR->get('Templates')->urlCDN('images/'.$this->icons['image']).'",
                    new google.maps.Size('.$this->icons['width'].','.$this->icons['height'].'),
                    new google.maps.Point(0,0),
                    new google.maps.Point('.$this->icons['anchor_x'].','.$this->icons['anchor_y'].')
                );
                var icon_shadow_image = new google.maps.MarkerImage(
                    "'.$this->PMDR->get('Templates')->urlCDN('images/'.$this->icons['shadow']).'",
                    new google.maps.Size('.$this->icons['shadow_width'].','.$this->icons['shadow_height'].'),
                    new google.maps.Point(0,0),
                    new google.maps.Point('.$this->icons['anchor_x'].','.$this->icons['anchor_y'].')
                );
            ';
        }

        foreach($this->markers as $key=>$marker) {
            $_output .= '
            var marker'.$key.' = new google.maps.Marker({
                position: new google.maps.LatLng('.$marker['lat'].','.$marker['lon'].'),
                map: map,
                title:"'.str_replace('"','\"',$marker['title']).'"';
                if(isset($marker['url']) AND !empty($marker['url'])) {
                    $_output .= ',url: "'.$marker['url'].'"';
                }
                if(count($this->markers) > 1 AND $key < 20) {
                    $_output .= ',icon: new google.maps.MarkerImage("'.$this->PMDR->get('Templates')->urlCDN('images/icon_google_map_markers.png').'", new google.maps.Size(20, 32), new google.maps.Point('.($key*20).', 0))';
                } else {
                    if(is_array($this->icons) AND count($this->icons) > 0) {
                        $_output .= ',
                        icon: icon_image,
                        shadow: icon_shadow_image';
                    }
                }
                $_output .= '
            });';

            if(!empty($marker['url'])) {
                $_output .= '
                google.maps.event.addListener(marker'.$key.', \'click\', function() {
                    window.location.href = marker'.$key.'.url;
                });';
            } elseif(!empty($marker['html'])) {
                $_output .= '
                var infowindow = new google.maps.InfoWindow();
                google.maps.event.addListener(marker'.$key.', \'click\', function() {
                  infowindow.close();
                  infowindow.setContent("'.str_replace(array('"',"\n","\r"),array('\"','',''),$marker['html']).'");
                  infowindow.open(map,marker'.$key.');
                });';
            }
        }
        if(count($this->markers) == 1 AND !empty($this->markers[0]['url'])) {
            // We have to set a timeout here for the click trigger to actually work and center the info window.
            $_output .= 'window.setTimeout(function(){google.maps.event.trigger(marker0,"click");},500);';
        }
        if(count($this->markers) > 1) {
            $_output .= 'map.fitBounds(new google.maps.LatLngBounds(new google.maps.LatLng('.$this->minLat.','.$this->minLon.'),new google.maps.LatLng('.$this->maxLat.','.$this->maxLon.')))';
        }

        $_output .= $this->script;

        if(!is_null($this->coordinatesSelector)) {
            $_output .= $this->getCoordinatesSelectorJS($this->coordinatesSelector['latitude_element'],$this->coordinatesSelector['longitude_element']);
        }
        $_output .= '}';
        if($this->onload) {
           $_output .= '}' . "\n";
        }

        $_output .= '//]]>'."\n";
        $_output .= '</script>' . "\n";
        return $_output;
    }

    /**
    * Get JS for coordinate selector
    * @param string $latitude_element
    * @param string $longitude_element
    * @return string
    */
    function getCoordinatesSelectorJS($latitude_element, $longitude_element) {
        return '
        var current_marker;
        map.setOptions({draggableCursor: \'crosshair\'});
        google.maps.event.addListener(map, \'click\', function(event) {
            map.panTo(event.latLng);
            if(current_marker) {
                current_marker.setMap(null);
            }
            if(typeof(marker0) != \'undefined\') {
                marker0.setMap(null);
            }
            var clickedLocation = new google.maps.LatLng(event.latLng);
            var marker = new google.maps.Marker({
                position: event.latLng,
                map: map
            });
            current_marker = marker;
            top.document.getElementById(\''.$latitude_element.'\').value = event.latLng.lat();
            top.document.getElementById(\''.$longitude_element.'\').value = event.latLng.lng();
        });';
    }

    /**
    * Get the map code
    * @return string
    */
    function getMap() {
        $_output = '<script type="text/javascript" charset="utf-8">'."\n".'//<![CDATA['."\n";
        $_output .= 'document.write(\'<div id="'.$this->mapID.'" class="map" style="'.$this->style.'"></div>\');'."\n";
        $_output .= '//]]>'."\n".'</script>'."\n";

        if($this->jsAlertMessage) {
            $_output .= '<noscript>'.$this->jsAlertMessage.'</noscript>'."\n";
        }

        return $_output;
    }

    /**
    * Get map URL
    * @param string $address
    * @param string $city
    * @param string $state
    * @param string $country
    * @param string $zip
    * @return string
    */
    function getMapURL($address, $city, $state, $country, $zip) {
        return 'http://maps.google.com/maps?q='.rawurlencode($address.' '.$city.' '.$state.' '.$zip.' '.$country);
    }

    /**
    * Get a static map image by address
    * @param string $address
    * @param string $city
    * @param string $state
    * @param string $country
    * @param mixed $zip
    */
    function getMapImage($address, $city, $state, $country, $zip) {
        $address_string = "$address,$city,$state,$country,$zip";
        return 'http'.(SSL_ON ? 's' : '').'://maps.googleapis.com/maps/api/staticmap?format=jpg&center='.$address_string.'&markers=color:red|label:A|'.$address_string.'&zoom='.$this->PMDR->getConfig('map_zoom').'&size=512x512&maptype=roadmap&sensor=false';
    }

    /**
    * Get a static map image by coordinates
    * @param float $latitude
    * @param float $longitude
    */
    function getMapImageByCoords($latitude,$longitude) {
        return 'http'.(SSL_ON ? 's' : '').'://maps.googleapis.com/maps/api/staticmap?format=jpg&center='.$latitude.','.$longitude.'&markers=color:red|label:A|'.$latitude.','.$longitude.'&zoom='.$this->PMDR->getConfig('map_zoom').'&size=512x512&maptype=roadmap&sensor=false';
    }
}

/**
* MapQuest subclass
*/
class MapQuest_Map extends Map {
    /**
    * Get map URL
    * @param string $address
    * @param string $city
    * @param string $state
    * @param string $country
    * @param string $zip
    * @return string
    */
    function getMapURL($address, $city, $state, $country, $zip) {
        return 'http://www.mapquest.com/maps/map.adp?city='.$city.'&amp;state='.$state.'&amp;address='.$address.'&amp;zip='.$zip.'&amp;country='.$country.'&amp;level=5';
    }

    /**
    * Get a static map image by address
    * @param string $address
    * @param string $city
    * @param string $state
    * @param string $country
    * @param mixed $zip
    */
    function getMapImage($address, $city, $state, $country, $zip) {
        $address_string = "$address,$city,$state,$country,$zip";
        return 'http'.(SSL_ON ? 's' : '').'://platform.beta.mapquest.com/staticmap/v3/getmap?key='.$this->apiKey.'&imageType=jpg&size=400,200&zoom='.$this->PMDR->getConfig('map_zoom').'&location='.$address_string.'showicon=green-1';
    }

    /**
    * Get a static map image by coordinates
    * @param float $latitude
    * @param float $longitude
    */
    function getMapImageByCoords($latitude,$longitude) {
        return 'http'.(SSL_ON ? 's' : '').'://platform.beta.mapquest.com/staticmap/v3/getmap?key='.$this->apiKey.'&imageType=jpg&size=400,200&zoom='.$this->PMDR->getConfig('map_zoom').'&center='.$latitude.','.$longitude;
    }

    /**
    * Get map header JS
    * @return string
    */
    function getHeaderJS() {
        return '<script type="text/javascript" src="http'.(SSL_ON ? 's' : '').'://www.mapquestapi.com/sdk/js/v7.0.s/mqa.toolkit.js?key='.$this->apiKey.'"></script>';
    }

    /**
    * Get marker javascript
    * @return string
    */
    function getAddMarkersJS() {
        $_output = '';
        foreach($this->markers as $key=>$marker) {
            $_output .= 'newCenter = new MQA.LatLng('.$marker['lat'].','.$marker['lon'].');';
            $_output .= 'map.setCenter(newCenter,7);';
            $_output .= 'var map_point = new MQA.Poi( {lat:'.$marker['lat'].', lng:'.$marker['lon'].'} );';
            $_output .= 'map_point.setValue(\'infoTitleHTML\',\''.$marker['title'].'\');';
            $_output .= 'map_point.setValue(\'infoContentHTML\',\''.str_replace(array('"',"\n","\r"),array('\"','',''),$marker['html']).'\');';
            $_output .= 'map_point.setKey(\''.$key.'\');';
            $_output .= 'map.addShape(map_point);';
        }
        return $_output;
    }

    /**
    * Get the map code
    * @return string
    */
    function getMap() {
        $_output = '<script type="text/javascript" charset="utf-8">'."\n";
        $_output .= 'document.write(\'<div id="'.$this->mapID.'" style="'.$this->style.'"><\/div>\');'."\n";
        $_output .= '</script>'."\n";

        if($this->jsAlertMessage) {
            $_output .= '<noscript>'.$this->jsAlertMessage.'</noscript>'."\n";
        }

        return $_output;
    }

    /**
    * Get Map javascript
    * @return string
    */
    function getMapJS() {
        $_output = '<script type="text/javascript" charset="utf-8">'."\n";

        if($this->onload) {
            $_output .= 'function mapOnLoad() {'."\n";
        }
        $_output .= '
        var options={
            elt:document.getElementById(\''.$this->mapID.'\'),
            zoom:10,
            latLng:{lat:39.743943, lng:-105.020089},
            mtype:\'map\',
            bestFitMargin:0,
            zoomOnDoubleClick:true
        };';

        $_output .= 'window.map = new MQA.TileMap(options);';

        if($this->controlType) {
            $_output .= '
            MQA.withModule(\'viewoptions\', function() {
                map.addControl(
                    new MQA.ViewOptions()
                );
            });';
        }

        if($this->scaleControl) {
            $_output .= '
            MQA.withModule(\'smallzoom\', function() {
              map.addControl(
                    new MQA.SmallZoom(),
                    new MQA.MapCornerPlacement(MQA.MapCorner.TOP_LEFT, new MQA.Size(5,5))
              );
            });';
        }

        if($this->overviewControl) {
            $_output .= '
                MQA.withModule(\'insetmapcontrol\', function() {
                    var options={
                        size:{ width:150, height:125},
                        zoom:3,
                        mapType:\'hyb\',
                        minimized:false
                    };
                    map.addControl(
                        new MQA.InsetMapControl(options),
                        new MQA.MapCornerPlacement(MQA.MapCorner.BOTTOM_RIGHT)
                    );
                });
            ';
        }


        $_output .= $this->getAddMarkersJS();

        if($this->onload) {
           $_output .= '}'."\n";
        }

        $_output .= '</script>' . "\n";
        return $_output;
    }
}

/**
* VirtualEarth Subclass
*/
class Bing_Map extends Map {
    /**
    * Get map URL
    * @param string $address
    * @param string $city
    * @param string $state
    * @param string $country
    * @param string $zip
    * @return string
    */
    function getMapURL($address, $city, $state, $country, $zip) {
        return 'http://maps.live.com/?v=2&where1='.$address.'+'.$city.'+'.$state.'+'.$zip.'+'.$country.'&encType=1';
    }

    /**
    * Get a static map image by address
    * @param string $address
    * @param string $city
    * @param string $state
    * @param string $country
    * @param mixed $zip
    */
    function getMapImage($address, $city, $state, $country, $zip) {
        $address_string = "$address,$city,$state,$country,$zip";
        return 'http'.(SSL_ON ? 's' : '').'://dev.virtualearth.net/REST/v1/Imagery/Map/imagerySet/centerPoint/'.$this->PMDR->getConfig('map_zoom').'?mapSize=350,350&centerPoint='.$latitude.','.$longitude.'&pushpin='.$latitude.','.$longitude.';1&format=jpeg&key='.$this->apiKey;
    }

    /**
    * Get a static map image by coordinates
    * @param float $latitude
    * @param float $longitude
    */
    function getMapImageByCoords($latitude,$longitude) {
        return 'http'.(SSL_ON ? 's' : '').'://dev.virtualearth.net/REST/v1/Imagery/Map/imagerySet/centerPoint/'.$this->PMDR->getConfig('map_zoom').'?mapSize=350,350&centerPoint=0,0&pushpin='.$latitude.','.$longitude.';1&format=jpeg&query='.$address_string.'&key='.$this->apiKey;
    }

    /**
    * Get map header JS
    * @return string
    */
    function getHeaderJS() {
        return '<script type="text/javascript" src="http'.(SSL_ON ? 's' : '').'://ecn.dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=6.2"></script>';
    }

    /**
    * Get marker javascript
    * @return string
    */
    function getAddMarkersJS() {
        $_output = '';
        foreach($this->markers as $key=>$marker) {
            $_output .= 'var pin = new VEShape(VEShapeType.Pushpin,new VELatLong('.$marker['lat'].', '.$marker['lon'].'));';
            $_output .= 'pin.SetTitle(\''.addslashes($marker['title']).'\');';
            $_output .= 'pin.SetDescription("");';
            $_output .= 'map.AddShape(pin);';
            $_output .= 'map.SetCenterAndZoom(new VELatLong('.$marker['lat'].', '.$marker['lon'].'), '.$this->zoomLevel.');';
        }
        return $_output;
    }

    /**
    * Get the map code
    * @return string
    */
    function getMap() {
        $_output = '<script type="text/javascript" charset="utf-8">'."\n";
        $_output .= 'document.write(\'<div id="'.$this->mapID.'" class="'.$this->mapID.'" style="position:relative; '.$this->style.'"><\/div>\');'."\n";
        $_output .= '</script>'."\n";

        if($this->jsAlertMessage) {
            $_output .= '<noscript>'.$this->jsAlertMessage.'</noscript>'."\n";
        }

        return $_output;
    }

    /**
    * Get Map javascript
    * @return string
    */
    function getMapJS() {
        $_output = '<script type="text/javascript" charset="utf-8">'."\n";

        if($this->onload) {
            $_output .= 'function mapOnLoad() {'."\n";
        }
        $_output .= 'map = new VEMap(\''.$this->mapID.'\');';
        $_output .= 'map.SetDashboardSize(VEDashboardSize.Small);';
        $_output .= 'map.AttachEvent("oncredentialserror", virtualEarthAPIError);';
        $_output .= 'map.SetCredentials(\''.$this->apiKey.'\');';
        $_output .= '$(\'#map\').css(\'width\',$(\'#map\').width()); $(\'#map\').css(\'height\',$(\'#map\').height());';
        $_output .= 'map.LoadMap();';

        if($this->controlType) {
            $_output .= 'map.ShowDashboard();' . "\n";
        } else {
            $_output .= 'map.HideDashboard();' . "\n";
        }

        $_output .= $this->getAddMarkersJS();

        if($this->onload) {
            $_output .= '}'."\n";
        }

        $_output .= 'function virtualEarthAPIError() { alert(\'Virtual Earth Map: Invalid API Key\'); }'."\n";;
        $_output .= '</script>'."\n";
        return $_output;
    }
}
?>