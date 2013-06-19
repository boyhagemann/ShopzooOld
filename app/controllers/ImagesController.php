<?php

use PHPQRCode\QRcode;

class ImagesController extends BaseController {

	public function resize($path, $width, $height)
	{
//		return Image::cache(function($image) use($path, $width, $height) {
			return Image::make(file_get_contents($path))->grab($width, $height);
//		});
	}

	public function qr($text, $size = 4)
	{
		return QRcode::png($text, false, 'L', $size, 2);
	}
}
