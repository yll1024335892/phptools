<?php
/**
 * 二维码生成类
 */
namespace Yll1024335892\Phptools;
class QrcodeClass{
	
	public static $includeRec = 0;
	
	public static function draw($data, $fileName, $size = 7, $padding = 1){
		if(self::$includeRec < 1){
			include_once 'lib/phpqrcode/qrlib.php';
		}
		\QRcode::png($data, $fileName, QR_ECLEVEL_L, $size, $padding);
		return $fileName;
	}
}