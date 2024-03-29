<?php
/**
* HTML Helper Class
* Builds generic and often used HTML tags
*/
class HTML {
    /**
    * Registry
    * @var object
    */
    var $PMDR;

    /**
    * HTML constructor
    * @return HTML
    */
    function __construct($PMDR) {
        $this->PMDR = $PMDR;
    }

    function tagsToArray($tags) {
        $tags = array_unique(array_filter(explode(',',$tags)));
        $tag_array = array();
        foreach($tags AS $tag) {
            if($found_attributes = strstr($tag,'[')) {
                //echo $found_attributes;
                $found_tag = str_replace($found_attributes,'',$tag);
                $found_attributes = trim($found_attributes,'[]');
                $found_attributes = array_unique(array_filter(explode('|',$found_attributes)));
                //$tag_array[$found_tag] = $found_attributes;
                if(isset($tag_array[$found_tag])) {
                    $tag_array[$found_tag] = array_unique(array_merge($tag_array[$found_tag],$found_attributes));
                } else {
                    $tag_array[$found_tag] = $found_attributes;
                }
            } else {
                $tag_array[$tag] = array();
            }
        }
        return $tag_array;
    }

    function tagsToString($tags, $tag_separator = ',', $attribute_separator = '|') {
        $tag_array = array();
        foreach($tags AS $tag=>$attributes) {
            if(count($attributes)) {
                $tag_array[] = $tag.'['.implode($attribute_separator,$attributes).']';
            } else {
                $tag_array[] = $tag;
            }
        }
        return implode($tag_separator,$tag_array);
    }

    /**
    * Generate a HTML tag
    * @param string $tag Tag
    * @param array $attributes Tag attributes
    * @param string $content Inner content of a tag
    * @param boolean $close Close the tag
    */
    private static function tag($tag, $attributes, $content = null, $close = true) {
        if(is_array($attributes)) {
            $attributes = $this->attributes($attributes);
        }
        $tag = '<'.$tag.$attributes.'>';
        if(!is_null($content)) {
            $tag .= $content;
        }
        if($close) {
            $tag .= '</'.$tag.'>';
        }
        return $tag;
    }

    public static function attributes($attributes) {
        $attributes_string = '';
        if(is_array($attributes)) {
            foreach($attributes AS $name=>$value) {
                $attributes_string .= ' '.$name.'="'.$value.'"';
            }
        }
        return $attributes_string;
    }

    /**
    * Get a HTML element attributes string
    * @param string $element
    * @param array $attributes
    * @param array $exclude
    * @return string
    */
    public static function attributesString($element,$attributes,$exclude=array()) {
        switch($element) {
            case 'input':
                $allowed_attributes = array('title','multiple','checked','disabled','readonly','style','maxlength','autocomplete','id','name','onfocus','onblur','onclick','onchange','onkeyup','onkeydown','onmouseover','onmouseout','placeholder','spellcheck');
                break;
            default:
                $allowed_attributes = null;
        }
        if(!is_null($allowed_attributes)) {
            $loop_attributes = array_intersect(array_keys($attributes),$allowed_attributes);
        }
        $loop_attributes = array_diff($loop_attributes,$exclude);
        $attributes_filtered = array();
        foreach($loop_attributes AS $loop_attribute) {
            $attributes_filtered[$loop_attribute] = $attributes[$loop_attribute];
        }
        $attributes_string = self::attributes($attributes_filtered);
        if(isset($attributes['class']) AND !in_array('class',$exclude)) {
            if(!is_array($attributes['class'])) {
                $attributes['class'] = array_filter(array($attributes['class']));
            }
            if(count($attributes['class'])) {
                $attributes_string .= ' class="'.implode(' ',array_unique((array) $attributes['class'])).'"';
            }
        }
        return $attributes_string;
    }

    /**
    * Generate a hyperlink
    * @param string $path Link URL path
    * @param string $text Text inside of the hyperlink
    * @param array $attributes Link attributes
    * @return string Formatted link
    */
    public static function link($path, $text, $attributes = array()) {
        $attributes['href'] = BASE_URL.'/'.$path;
        return $this->tag('a',$attributes,$text);
    }

    /**
    * Generate a SSL/HTTPS hyperlink
    * @param string $path Link URL path
    * @param string $text Text inside of the hyperlink
    * @param array $attributes Link attributes
    * @return string Formatted link
    */
    public static function link_ssl($path, $text, $attributes = array()) {
        $attributes['href'] = BASE_URL_SSL.'/'.$path;
        return $this->tag('a',$attributes,$text);
    }

    /**
    * Generate an image tag
    * @param string $file File name
    * @param string $alt_text Alternative text
    * @param array $attributes Image attributes
    * @return string Formatted image tag
    */
    public static function image($file, $alt_text, $attributes = array()) {
        $attributes['src'] = BASE_URL.'/'.$file;
        $attributes['alt'] = $alt_text;
        return $this->tag('img',$attributes,null,false);
    }

    /**
    * Generate a script tag
    * @param string $file File name of javascript file
    * @return string Formatted script tag
    */
    public static function script($file) {
        $attributes['type'] = 'text/javascript';
        $attributes['src'] = BASE_URL.'/'.$file;
        return $this->tag('script',$attributes);
    }

    /**
    * Generate a style tag
    * @param string $file File name
    * @param string $media Media type of file
    * @return string Formatted style tag
    */
    public static function style($file, $media = null) {
        if(!is_null($media)) {
            $attributes['media'] = $media;
        }
        $attributes['rel'] = 'stylesheet';
        $attributes['type'] = 'text/css';
        $attributes['href'] = BASE_URL.'/'.$file;
        return $this->tag('script',$attributes,null,false);
    }

    /**
    * Generic icon code
    * @param string $type Icon name used for CSS
    * @param mixed $parameters
    * @return string;
    */
    public function icon($type, $parameters = array()) {
        switch($type) {
            case 'delete':
                if(!isset($parameters['href'])) {
                    $parameters['href'] = URL_NOQUERY.'?action=delete&'.http_build_query($parameters);
                }
                if(!is_null($parameters['href'])) {
                    $icon = '<a class="icon_link" href="'.$parameters['href'].'" onclick="return confirm(\''.$this->PMDR->getLanguage('messages_confirm').'\');" title="'.$this->PMDR->getLanguage('admin_delete').'">';
                }
                $icon .= '<div class="icon icon_x_red"></div>';
                if(!is_null($parameters['href'])) {
                    $icon .= '</a>';
                }
                break;
            case 'edit':
                if(!isset($parameters['href'])) {
                    $parameters['href'] = URL_NOQUERY.'?action=edit&'.http_build_query($parameters);
                }
                $icon = '<a class="icon_link" href="'.$parameters['href'].'" title="'.$this->PMDR->getLanguage('admin_edit').'">';
                $icon .= '<div class="icon icon_edit"></div>';
                $icon .= '</a>';
                break;
            default:
                if(isset($parameters['href'])) {
                    $icon = '<a class="icon_link';
                    if(isset($parameters['class'])) {
                        $icon .= ' '.$parameters['class'];
                    }
                    $icon .= '" ';
                    if(isset($parameters['rel'])) {
                        $icon .= 'rel="'.$parameters['rel'].'" ';
                    }
                    if(isset($parameters['target'])) {
                        $icon .= 'target="'.$parameters['target'].'" ';
                    }
                    if(isset($parameters['id'])) {
                        $icon .= 'id="'.$parameters['id'].'" ';
                    }
                    if(isset($parameters['onclick'])) {
                        $icon .= 'onclick="'.$parameters['onclick'].'" ';
                    }
                    $icon .= 'href="'.$parameters['href'].'"';
                    if(isset($parameters['title'])) {
                        $icon .= ' title="'.$parameters['title'].'"';
                    } elseif(isset($parameters['label'])) {
                        $icon .= ' title="'.$parameters['label'].'"';
                    }
                    $icon .= '>';
                }
                $icon .= '<div class="icon icon_'.$type.'"></div>';
                if(isset($parameters['href'])) {
                    $icon .= '</a>';
                }
                break;
        }
        return $icon;
    }
}
?>