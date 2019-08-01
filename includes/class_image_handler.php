<?php
/**
* Image Handler
*/
class Image_Handler {
    /**
    * @var Registry
    */
    var $PMDR;
    /**
    * @var Database
    */
    var $db;
    /**
    * File path to the image
    * @var string
    */
    var $file_path;
    /**
    * File name
    * @var string
    */
    var $file_name;
    /**
    * File format (jpg, gif, etc)
    * @var string
    */
    var $file_format;
    /**
    * Image object
    * @var object
    */
    var $image = null;

    /**
    * Image Handler Contructor
    * @param object $PMDR
    * @return void
    */
    function Image_Handler($PMDR) {
        $this->PMDR = $PMDR;
        $this->loadLibrary();
    }

    /**
    * Load the needed image library
    * @return void
    */
    function loadLibrary() {
        require_once(PMDROOT.'/includes/phpThumb/ThumbLib.inc.php');
    }

    /**
    * Load an image
    * @param mixed $image Array or file path to the image to be loaded
    * @return boolean
    */
    function loadImage($image) {
        if(is_array($image) AND isset($image['tmp_name']) AND is_uploaded_file($image['tmp_name'])) {
            $this->file_path = $image['tmp_name'];
            $this->file_name = $image['name'];
        } elseif(valid_url($image)) {
            $ch = curl_init($image);
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            // Take into account redirects for images
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
            $image_data = curl_exec($ch);
            if(!curl_errno($ch)) {
                $image = curl_getinfo($ch,CURLINFO_EFFECTIVE_URL);
            } else {
                curl_close($ch);
                return false;
            }
            curl_close($ch);
            if($image_resource = @imagecreatefromstring($image_data)) {
                if(@imagejpeg($image_resource,TEMP_UPLOAD_PATH.basename($image).'.jpg')) {
                    $this->file_name = basename($image);
                    $this->file_path = TEMP_UPLOAD_PATH.basename($image).'.jpg';
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } elseif(is_string($image) AND file_exists($image)) {
            $this->file_path = $image;
            $this->file_name = basename($image);
        } else {
            return false;
        }

        $this->file_format = get_image_extension($this->file_path);
        if(!getimagesize($this->file_path)) {
            return false;
        } elseif(!is_animated_gif($this->file_path) AND in_array($this->file_format,array('jpg','jpeg','gif','png'))) {
            try {
                $this->image = PhpThumbFactory::create($this->file_path);
                return true;
            } catch (Exception $e) {
                return false;
            }
        }
        return true;
    }

    /**
    * Resize the image to a specific height and width and crop if needed
    * @param integer $width
    * @param integer $height
    * @return void
    */
    function adaptiveResize($width, $height) {
        if(!is_null($this->image)) {
            $this->image->adaptiveResize($width, $height);
        }
    }

    /**
    * Resize the image to a specific height and width and do not crop
    * @param integer $width
    * @param integer $height
    * @return void
    */
    function resize($width, $height) {
        if(!is_null($this->image)) {
            $this->image->resize($width, $height);
        }
    }

    /**
    * Add a Watermark
    * @param string $watermark file
    * @return void
    */
    function addWatermark($watermark) {
        if(!is_null($this->image) AND file_exists($watermark)) {
            $this->image->createWatermark($watermark);
        }
    }

    /**
    * Set options in the image object
    * @param array $options
    * @return void
    */
    function setOptions($options) {
        if(!is_null($this->image)) {
            $this->image->setOptions($options);
        }
    }

    /**
    * Save the image to file
    * @param string $to File path to save to
    * @return bool
    */
    function save($to) {
        if(is_animated_gif($this->file_path) OR $this->file_format == 'swf') {
            if(is_uploaded_file($this->file_path)) {
                return move_uploaded_file($this->file_path,$to);
            } else {
                copy($this->file_path, $to);
                chmod($to,0755);
                return true;
            }
        } elseif(!is_null($this->image)) {
            try {
                $this->image->save($to);
            } catch (Exception $e) {
                return false;
            }
            return true;
        } else {
            return false;
        }
    }

    /**
    * Process the image
    * @param mixed $image
    * @param string $to File path
    * @param array $options Width, height, enlarge, quality
    * @return bool
    */
    function process($image, $to, $options = array()) {
        if(!$this->loadImage($image)) {
            return false;
        }
        if(!isset($options['quality'])) {
            $options['quality'] = 100;
        }
        if(!isset($options['enlarge'])) {
            $options['enlarge'] = false;
        }

        $this->setOptions(array('jpegQuality'=>$options['quality'],'resizeUp'=>$options['enlarge']));

        if(!isset($options['width'])) {
            $options['width'] = 0;
        }
        if(!isset($options['height'])) {
            $options['height'] = 0;
        }

        if($options['crop'] AND $options['height'] > 0 AND $options['width'] > 0) {
            $this->adaptiveResize($options['width'], $options['height']);
        } else {
            $this->resize($options['width'], $options['height']);
        }

        // Add setting for watermark
        if(isset($options['watermark']) AND $this->PMDR->get('Templates')->path('images/watermark.png')) {
            $this->addWatermark($this->PMDR->get('Templates')->path('images/watermark.png'));
        }

        // Remove any old same name files from the path we will be writing the new image to.
        if(isset($options['remove_old']) AND $options['remove_old']) {
            @unlink(find_file(str_replace('.'.pathinfo($to,PATHINFO_EXTENSION),'.*',$to)));
        }

        return $this->save(str_replace('*',$this->file_format,$to));
    }
}
?>