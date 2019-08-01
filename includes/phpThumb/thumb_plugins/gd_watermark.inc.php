<?php
/**
* Uses imagecopy for PNG/GIF to allow transparency from the mask file.
* Uses imagecopymerge for JPG to create artifical transparency.
*/
class GdWatermark
{
	public function createWatermark ($mask_file, $that)
	{
		$image = $that->getOldImage();
		$stamp_image = NULL;
		$marge_right = 10;
		$marge_bottom = 10;

		list($sx, $sy, $stamp_type) = getimagesize($mask_file);
		switch($stamp_type)
		{
			case 1:
                $stamp_image = imagecreatefromgif($mask_file);
				imagecopy($image, $stamp_image, imagesx($image) - $sx - $marge_right, imagesy($image) - $sy - $marge_bottom, 0, 0, imagesx($stamp_image), imagesy($stamp_image));
		        break;
			case 2:
			    $stamp_image = imagecreatefromjpeg($mask_file);
				imagecopymerge($image, $stamp_image, imagesx($image) - $sx - $marge_right, imagesy($image) - $sy - $marge_bottom, 0, 0, imagesx($stamp_image), imagesy($stamp_image), 60);
    			break;
			case 3:
			    $stamp_image = imagecreatefrompng($mask_file);
    	        imagecopy($image, $stamp_image, imagesx($image) - $sx - $marge_right, imagesy($image) - $sy - $marge_bottom, 0, 0, imagesx($stamp_image), imagesy($stamp_image));
				break;
		}

		return $that;
	}
}

$pt = PhpThumb::getInstance();
$pt->registerPlugin('GdWatermark', 'gd');
?>