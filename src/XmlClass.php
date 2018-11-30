<?php
/**
 * xml 生成、创建类
 */
namespace Yll1024335892\Phptools;
class XmlClass {
	
	public function create($data, $rootName = 'root'){
		$xml = '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL;
		$xml .= '<'.$rootName.'>'.PHP_EOL;
		if(is_array($data)){
			foreach($data as $item){
				$xml .= '	<'.$item['nodeName'].'>'.PHP_EOL;
					foreach($item as $k => $v){
						if($k != 'nodeName'){
							$xml .= '		<'.$k.'>'.$v.'</'.$k.'>'.PHP_EOL;
						}
					}
				$xml .= '	</'.$item['nodeName'].'>'.PHP_EOL;
			}
		}else{
			$xml .= $data.PHP_EOL;
		}
		$xml .= '</'.$rootName.'>';
		return $xml;
	}
	
	public function reader($xmlContent){
		$xml      =  simplexml_load_string($xmlContent);
		$xmljson  = json_encode($xml);
		return json_decode($xmljson, true);
	}
}