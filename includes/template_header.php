<?php
$PMDR->get('Plugins')->run_hook('template_header_begin');

// If a custom header file is set, use it, or else use the default header.tpl file
if($PMDR->get('header_file') AND $PMDR->get('Templates')->path($PMDR->get('header_file'))) {
    $header = $PMDR->getNew('Template',PMDROOT.TEMPLATE_PATH.$PMDR->get('header_file'));
} elseif(is_null($PMDR->get('header_file'))) {
    $header = $PMDR->getNew('Template',null);
} else {
    $header = $PMDR->getNew('Template',PMDROOT.TEMPLATE_PATH.'header.tpl');
}

// Check for maintenance option and show header message bar if necesarry
if($PMDR->getConfig('maintenance') AND @in_array('admin_login',$_SESSION['admin_permissions'])) {
    $header->set('maintenance',true);
} else {
    $header->set('maintenance',false);
}

if($PMDR->get('Session')->get('admin_id') AND $PMDR->get('Session')->get('admin_id') != $PMDR->get('Session')->get('user_id')) {
    $header->set('admin_as_user',$PMDR->get('Session')->get('user_id'));
    $header->set('admin_as_user_message',$PMDR->getLanguage('admin_as_user',array($PMDR->get('Session')->get('user_id'),BASE_URL.MEMBERS_FOLDER.'index.php?user_login='.$PMDR->get('Session')->get('admin_id'))));
} else {
    $header->set('admin_as_user',false);
}

// Initialize meta tags array
$meta_tags = array();

// If a custom meta description is set, use it, or else use the default meta description
$meta_tags[] = '<meta name="description" content="'.$PMDR->get('Cleaner')->clean_output(($PMDR->get('meta_description') ? $PMDR->get('meta_description') : (!on_page('/index.php') ? array_pop($PMDR->get('page_title')).' - ' : '').$PMDR->getConfig('meta_description_default')),true).'" />';

// If custom meta keywords are set, use it, or else the default meta keywords
$meta_tags[] = '<meta name="keywords" content="'.Strings::comma_separated($PMDR->get('Cleaner')->clean_output(($PMDR->get('meta_keywords') ? $PMDR->get('meta_keywords') : $PMDR->getConfig('meta_keywords_default')),true)).'" />';

// Set geo location meta tags if available
if($PMDR->get('meta_geo_position')) {
    $meta_tags[] = '<meta name="geo.position" content="'.$PMDR->get('meta_geo_position').'" />';
}

// Set all meta tags
$header->set('meta_tags',implode("\n",$meta_tags), null);

// Set the canonical URL useful to prevent duplicate content
if($PMDR->get('canonical_url')) {
    $header->set('canonical_url','<link rel="canonical" href="'.$PMDR->get('Cleaner')->clean_output($PMDR->get('canonical_url')).'" />');
} else {
    $header->set('canonical_url',false);
}

// Set the previous URL for pagination SEO
if($PMDR->get('previous_url')) {
    $header->set('previous_url',$PMDR->get('Cleaner')->clean_output($PMDR->get('previous_url')));
}

// Set the next URL for pagination SEO
if($PMDR->get('next_url')) {
    $header->set('next_url',$PMDR->get('Cleaner')->clean_output($PMDR->get('next_url')));
}

// Set the display of the search form
if($PMDR->getConfig('search_display_all') OR on_page('/index.php')) {
    $header->set('searchform',$searchform);
    $header->set('search_display_all',($PMDR->getConfig('search_display_all') OR on_page('/index.php')));
}

// Set user logged in details
if(!empty($_SESSION['user_first_name'])) {
    $header->set('username',trim($_SESSION['user_first_name'].' '.$_SESSION['user_last_name']));
} elseif(!empty($_SESSION['user_login'])) {
    $header->set('username',$_SESSION['user_login']);
} else {
    $header->set('username',false);
}

// Load jQuery libraries and CSS stylesheet
if ($PMDR->getConfig('use_remote_libraries')) {
    $PMDR->loadJavascript('<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>',10);
    $PMDR->loadJavascript('<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>',10);
} else {
    $PMDR->loadJavascript('<script type="text/javascript" src="'.CDN_URL.'/includes/jquery/jquery.js"></script>',10);
    $PMDR->loadJavascript('<script type="text/javascript" src="'.CDN_URL.'/includes/jquery/jquery_custom.js"></script>',10);
}
$PMDR->loadJavascript('<script type="text/javascript" src="'.CDN_URL.'/includes/javascript_global.js"></script>',15);
$PMDR->loadJavascript('<script type="text/javascript" src="'.$PMDR->get('Templates')->urlCDN('javascript.js').'"></script>',15);

// Load jQuery CSS
$PMDR->loadCSS('<link rel="stylesheet" type="text/css" href="'.CDN_URL.'/includes/jquery/jquery.css" />',10);

// Detect IE 7/8 and load CSS
if(isset($_SERVER['HTTP_USER_AGENT']) AND !empty($_SERVER['HTTP_USER_AGENT'])) {
    if(preg_match('/MSIE 8/i',$_SERVER['HTTP_USER_AGENT'])) {
        $PMDR->loadCSS('<link rel="stylesheet" type="text/css" href="'.$PMDR->get('Templates')->urlCDN('css-ie8.css').'" />',10);
    } elseif(preg_match('/MSIE 7/i',$_SERVER['HTTP_USER_AGENT'])) {
        $PMDR->loadCSS('<link rel="stylesheet" type="text/css" href="'.$PMDR->get('Templates')->urlCDN('css-ie7.css').'" />',10);
    }
}
// Load main CSS
$PMDR->loadCSS('<link rel="stylesheet" type="text/css" href="'.$PMDR->get('Templates')->urlCDN('css.css').'" />',10);

// Set up AJAX
$PMDR->loadJavascript('
    <script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            url:"'.BASE_URL.'/ajax.php",
            type:"POST",
            data:{
                '.COOKIE_PREFIX.'from:'.$PMDR->get('Cleaner')->output_js((isset($_COOKIE[COOKIE_PREFIX.'from']) ? $_COOKIE[COOKIE_PREFIX.'from'] : constant(COOKIE_PREFIX.'from'))).'
            }
        });
    });
    </script>'
,20);

// Load javascript set in the administrative area
$PMDR->loadJavascript($PMDR->getConfig('head_javascript'),25);

// Set and load the onload javascript
$onLoad = '<script type="text/javascript">'."\n";
$onLoad .= '//<![CDATA['."\n";
$onLoad .= '$(window).load(function(){';
if($PMDR->get('javascript_onload')) {
    $onLoad .= implode("\n",$PMDR->get('javascript_onload'));
}
if(!$PMDR->getConfig('disable_cron')) {
    $onLoad .= '$.getScript("'.BASE_URL.'/cron.php?type=javascript");';
}
$onLoad .= '});'."\n";
$onLoad .= '//]]>'."\n";
$onLoad .= '</script>'."\n";
$PMDR->loadJavascript($onLoad,30);
unset($onLoad);

if(!isset($_SESSION['location']) AND $PMDR->getConfig('geolocation_fill')) {
    $PMDR->loadJavascript('
    <script type="text/javascript">
    $(window).load(function(){
        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                $.ajax({
                    data: ({
                        action: \'geolocation_cache\',
                        ip: "'.get_ip_address().'",
                        latitude: position.coords.latitude,
                        longitude: position.coords.longitude
                    }),
                    success: function() {}
                });
            });
        }
    });
    </script>',35);
}

// Set the javascript and css in the template
$header->set('javascript',$PMDR->getJavascript());
$header->set('css',$PMDR->getCSS());

// Add title from configuration to end of array and display, seperated by a dash -
$header->set('title',$PMDR->getConfig('title'));
if($PMDR->get('meta_title') != '') {
    array_pop($PMDR->data['page_title']);
    //$PMDR->setAdd('page_title',array_shift($PMDR->get('page_title')),true);
    $PMDR->setAdd('page_title',$PMDR->get('meta_title'));
}
$header->set('page_title',implode(' - ',array_filter(array_reverse((array) $PMDR->get('page_title')))));

if($PMDR->get('breadcrumb')) {
    $header->set('breadcrumb',$PMDR->get('breadcrumb'));
} else {
    $header->set('breadcrumb',false);
}

// Set the 2 character language code in the template
$header->set('languagecode',substr($PMDR->getLanguage('languagecode'),0,2));

// Set the text direction
$header->set('textdirection',$PMDR->getLanguage('textdirection'));

$PMDR->get('Plugins')->run_hook('template_header_end');
?>