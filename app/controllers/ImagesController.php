<?php

class ImagesController extends BaseController {

	public function resize($path, $width, $height)
	{
//		return Image::cache(function($image) use($path, $width, $height) {
			return Image::make(file_get_contents($path))->grab($width, $height);
//		});
	}
}
