<?php
/**
* Remove magic quotes from a string
* @param array $data
* @return array
*/
function strip_magic_quotes($data) {
    foreach($data as $k=>$v) {
        $data[$k] = is_array($v) ? strip_magic_quotes($v) : stripslashes($v);
    }
    return $data;
}

/**
* Print out an array or object
* Primary used for debugging purposes
* @param mixed $array
*/
function print_array($array,$exit = false) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
    if($exit) {
        exit();
    }
}

/**
* Check a string against the current file being viewed
* @param mixed $page String or array of strings to check
* @param bool $partial_match Allow partial matching
*/
function on_page($page,$partial_match = false) {
    if(!is_array($page)) {
        $page = array($page);
    }
    $current_page = substr($_SERVER['SCRIPT_FILENAME'],
        strpos($_SERVER['SCRIPT_FILENAME'], PMDROOT) + strlen(PMDROOT)
    );
    foreach($page AS $name) {
        if($partial_match) {
            if(strstr($current_page,$name)) {
                return true;
            }
        } elseif(ltrim($name,'/') == ltrim($current_page,'/')) {
            return true;
        }
    }
    return false;
}

/**
* Redirect based on specific parameters
* @param string $path Path to redirect to
* @param string $parameters Parameters to determine how the redirect is handled
*/
function redirect($path = null, $parameters = array()) {
    if(isset($parameters['from'])) {
        $parameters['from'] = urlencode_url($parameters['from']);
    }
    if(is_array($path)) {
        $parameters = $path;
        $path = null;
    }
    if(isset($_GET['from']) AND !empty($_GET['from']) AND !isset($parameters['from'])) {
        if($parameters === false) {
            $parameters = array('from'=>$_GET['from']);
            $path = urldecode($path);
        } else {
            $parameters = array();
            $path = base64_decode(urldecode($_GET['from']));
        }
    } elseif(!empty($path)) {
        $path = urldecode($path);
    } else {
        $path = URL_NOQUERY;
    }
    if(is_array($parameters) AND count($parameters) > 0) {
        $path .= '?';
        $path .= http_build_query($parameters);
    }
    redirect_url($path);
}

/**
* Redirect a URL
* @param string $path URL or path to redirect to
*/
function redirect_url($path) {
    session_write_close();
    header('Location: '.Strings::strip_new_lines($path));
    exit();
}

/**
* Round up bytes to kilobytes, megabytes, etc
* @param string $size B|KB|MB|GB
* @return float Rounded size
*/
function round_up_bytes($size) {
    if($size < 1024) {
        return array('size'=>round($size,2),'label'=>'B');
    } elseif($size >= 1024 AND $size < 1048576) {
        return array('size'=>round(($size / 1024),2),'label'=>'KB');
    } elseif($size >= 1048576 AND $size < 1073741824) {
        return array('size'=>round(($size / 1048576),2),'label'=>'MB');
    } else {
        return array('size'=>round(($size / 1073741824),2),'label'=>'GB');
    }
}

/**
* Get the file extension using string methods
* @param string $file_name
* @return string
*/
function get_file_extension($file_name) {
    if(empty($file_name) OR !is_string($file_name)) {
        return false;
    }
    return strtolower(substr(strrchr($file_name,'.'), 1));
}

/**
* Get the file URL based on it's root path
* @param string $file
* @return string
*/
function get_file_url($file, $nocache = false) {
    if($file = find_file($file)) {
        $url = str_replace(FILES_PATH,FILES_URL,$file);
    } else {
        return false;
    }
    if($nocache) {
        $url .= '?revision='.md5_file($file);
    }
    return $url;
}

/**
* Get the file CDN URL based on it's root path
* @param string $file
* @return string
*/
function get_file_url_cdn($file) {
    // We only do the replacement if a CDN_URL has been set and is different than the BASE_URL
    // This allows a FILES URL to be used for static files while template files still remain in the local installation
    if(BASE_URL != CDN_URL) {
        return str_replace(FILES_URL,CDN_URL,get_file_url($file));
    } else {
        return get_file_url($file);
    }
}

/**
* Find a file while allowing * wildcard
* @param string $file
* @return mized
*/
function find_file($file) {
    if($results = glob($file)) {
        if($file = array_shift($results)) {
            return $file;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

/**
* Unshift an element off an associative array
* @param array $arr Array to unshift from
* @param string $key Key to unshift
* @param mixed $val Value to unshift
* @return int Number of items on array
*/
function array_unshift_assoc(&$arr, $key, $val) {
    $arr = array_reverse($arr, true);
    $arr[$key] = $val;
    $arr = array_reverse($arr, true);
    return count($arr);
}

/**
* Get an images size and other details
* @param string $image Image
* @return array Image details
*/
function get_image_size($image) {
    if($image = getimagesize($image)) {
        $image[2] = image_type_to_extension($image[2],false);
        if($image[2] == 'jpeg') {
            $image[2] = 'jpg';
        }
        return $image;
    } else {
        return false;
    }
}

/**
* Get file format of an uploaded file
* We need this in case finfo or mime_content_type is not available so we can check the extension
* @param string $file
* @return string Mime type or format
*/
function get_uploaded_file_format($file) {
    if(!$format = get_file_format($file['tmp_name'])) {
        $format = get_file_format($file['name']);
    }
    return $format;
}

/**
* Get file format by checking MIME information
* @param string $file
* @return string Mime type or format
*/
function get_file_format($file) {
    if(function_exists('finfo_open')) {
        $file_info = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_file($file_info, $file);
        finfo_close($file_info);
        if($mime_type) {
            return $mime_type;
        }
    }

    if(function_exists('mime_content_type')) {
        if($mime_type = @mime_content_type($file)) {
            return $mime_type;
        }
    }

    if($extension = get_file_extension($file)) {
        switch($extension) {
            case 'js' :
                return 'application/x-javascript';
            case 'json' :
                return 'application/json';
            case 'jpg' :
            case 'jpeg' :
            case 'jpe' :
                return 'image/jpg';
            case 'png' :
            case 'gif' :
            case 'bmp' :
            case 'tiff' :
                return 'image/'.$extension;
            case 'css' :
                return 'text/css';
            case 'xml' :
                return 'application/xml';
            case 'doc' :
            case 'docx' :
                return 'application/msword';
            case 'xls' :
            case 'xlt' :
            case 'xlm' :
            case 'xld' :
            case 'xla' :
            case 'xlc' :
            case 'xlw' :
            case 'xll' :
                return 'application/vnd.ms-excel';
            case 'ppt' :
            case 'pps' :
                return 'application/vnd.ms-powerpoint';
            case 'rtf' :
                return 'application/rtf';
            case 'pdf' :
                return 'application/pdf';
            case 'html' :
            case 'htm' :
            case 'php' :
                return 'text/html';
            case 'txt' :
                return 'text/plain';
            case 'mpeg' :
            case 'mpg' :
            case 'mpe' :
                return 'video/mpeg';
            case 'mp3' :
                return 'audio/mpeg3';
            case 'wav' :
                return 'audio/wav';
            case 'aiff' :
            case 'aif' :
                return 'audio/aiff';
            case 'avi' :
                return 'video/msvideo';
            case 'wmv' :
                return 'video/x-ms-wmv';
            case 'mov' :
                return 'video/quicktime';
            case 'zip' :
                return 'application/zip';
            case 'tar' :
                return 'application/x-tar';
            case 'swf' :
                return 'application/x-shockwave-flash';
            default:
                return 'unknown/'.trim($extension,'.');
        }
    }
    return false;
}

/**
* Get image extension
* @param string $file File to get extension from
* @return string Extension
*/
function get_image_extension($file) {
    if($image = get_image_size($file)) {
        return $image[2];
    } else {
        return false;
    }
}

/**
* Standardize a URL by ensuring a protocol prefix
* @param string $url URL to standardize
* @return string Standardized URL
*/
function standardize_url($url) {
    if(empty($url)) return $url;
    return (strstr($url,'http://') OR strstr($url,'https://')) ? $url : 'http://'.$url;
}

/**
* Check if a GIF is animated
* @param string $img
* @return bool
*/
function is_animated_gif($img) {
    if(empty($img)) return false;

    $contents = file_get_contents($img);
    $location = 0;
    $count = 0;

    if((substr($contents, 0, 6) != 'GIF89a') AND (substr($contents, 0, 6) != 'GIF87a')) {
        return false;
    }

    while ($count < 2) {
        $first_occurance = strpos($contents,"\x00\x21\xF9\x04",$location);
        if ($first_occurance === FALSE) {
            break;
        } else {
            $location = $first_occurance+1;
            $second_occurance = strpos($contents,"\x00\x2C",$location);
            if ($second_occurance === FALSE) {
                break;
            } else {
                if ($first_occurance+8 == $second_occurance) {
                    $count++;
                }
                $location = $second_occurance+1;
            }
        }
    }
    return ($count > 1) ? true : false;
}

/**
* Rebuild a URL by removing paramters or adding them
* @param mixed $add Parameters to add
* @param mixed $remove Parameters to remove
* @param mixed $open_ended Leave URL open with a ? character
* @return string Rebuilt URL
*/
function rebuild_url($add = array(), $remove = array(), $open_ended = false) {
    $url_parts = parse_url(URL);
    if(!empty($url_parts['query'])) {
        parse_str($url_parts['query'],$query_string);
        foreach($remove AS $key) {
            unset($query_string[$key]);
        }
    } else {
        $query_string = array();
    }
    $query_string = array_merge($query_string,$add);
    $replace = '';
    if(count($query_string)) {
        $replace = '?'.http_build_query($query_string);
        if($open_ended) {
            $replace .= '&';
        }
    } elseif($open_ended) {
        $replace .= '?';
    }
    return URL_NOQUERY.$replace;
}

/**
* Get IP Address
* @return string IP address
*/
function get_ip_address() {
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

/**
* Unlink file
* @param string $file
*/
function unlink_file($file) {
    if(file_exists($file)) {
        return unlink($file);
    } else {
        return false;
    }
}

/**
* Unlink all files in a folder
* @param string $dir Folder to unlink files in
*/
function unlink_files($dir) {
    if(!$dh = @opendir($dir)) {
        return;
    }
    while (false !== ($file = readdir($dh))) {
        if($file != '.' AND $file != '..') {
            @unlink($dir.$file);
        }
    }
    closedir($dh);
    return;
}

/**
* Unlink folder and all contents
* @param string $folder Folder to unlink
* @return bool true|false Success or failure
*/
function unlink_directory($folder)  {
    if(is_dir($folder)) {
        $dh = opendir($folder);
    }
    if(!$dh) return false;
    while(false !== ($file = readdir($dh))) {
        if($file != '.' AND $file != '..') {
            if(!is_dir($folder.$file)) {
                unlink($folder.$file);
            } else {
                unlink_directory($folder.$file.'/');
            }
        }
    }
    closedir($dh);
    rmdir($folder);
    return true;
}

/**
* Check if a specific URL exists
* @param string $url
* @return bool
*/
function url_exists($url) {
    if(@file_get_contents($url,0,NULL,0,1)) {
        return true;
    } else {
        return false;
    }
}

function move_files($source, $destination) {
    if(!file_exists($destination) AND !mkdir($destination)) {
        return false;
    }
    if(!is_dir($destination) OR !is_writable($destination)) {
        return false;
    }
    if($handle = opendir($source)) {
        while(false !== ($file = readdir($handle))) {
            if(is_file($source.'/'.$file)) {
                rename($source.'/'.$file, $destination.'/'.$file);
            }
        }
        closedir($handle);
    } else {
        return false;
    }
}

/**
* Parse a string as PHP
* @param string $string
* @return string
*/
function parse_php($string) {
    ob_start();
    eval('?>'.$string);
    $string = ob_get_contents();
    ob_end_clean();
    return $string;
}

/**
* Get an array of countries
* @return array Array of countries
*/
function get_countries_array() {
    include(PMDROOT.'/includes/country_codes.php');
    $countries = array();
    foreach($country_codes AS $code=>$country) {
        $countries[$country] = $country;
    }
    unset($country_codes,$code,$country);
    return $countries;
}

/**
* Get an array of countries
* @return array Array of countries
*/
function get_states_array() {
    include(PMDROOT.'/includes/state_codes.php');
    $states = array();
    foreach($state_codes AS $code=>$state) {
        $state = ucwords(strtolower($state));
        $states[$state] = $state;
    }
    unset($state_codes,$code,$state);
    return $states;
}

/**
* Check if a URL is valid
* @param string $url URL to check
* @param bool $ftp Allow FTP protocol
* @return bool
*/
function valid_url($url, $ftp = false) {
    if(!is_string($url)) {
        return false;
    }
    return preg_match('/('.($ftp ? 'ftp|' : '').'http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/',$url);
}

/**
* Base 64 encode a URL then urlencode it
* @param string $string URL to encode
* @return string Encoded URL
*/
function urlencode_url($string) {
    if(valid_url($string)) {
        return urlencode(base64_encode($string));
    } else {
        return $string;
    }
}

/**
* Get the value of an array key
* @param mixed $value
* @param string $key
* @param mized $default_value
* @return mixed
*/
function value($value,$key=0,$default=false) {
    if((is_string($key) OR is_int($key)) AND is_array($value)) {
        if(array_key_exists($key,$value)) {
            return $value[$key];
        }
    }
    return $default;
}

/**
* Check if the browser is mobile
*/
function is_mobile() {
    $useragent = $_SERVER['HTTP_USER_AGENT'];
    if(preg_match('
        /android.+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|meego.+mobile|
        midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|
        wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|
        ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|
        br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|
        ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|
        haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|
        ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|
        \-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|
        mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|
        owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|
        qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|
        sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|
        t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|
        80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',
        substr($useragent,0,4))) {
        return true;
    }
}
?>