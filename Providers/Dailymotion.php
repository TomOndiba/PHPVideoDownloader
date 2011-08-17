<?php

class Dailymotion extends Hoster {

	function Dailymotion($url) {
		$this->url=$url;
		$json=$this->getpage($this->url);
		
		preg_match('|addVariable\("sequence",(.*?)"\);|U', $json, $result);
		$decoded=trim(urldecode($result[1]));
		$decoded=substr($decoded,1,strlen($decoded));
		
		
		preg_match('|"videoPluginParameters":(.*?),"end"|U', $decoded, $result);
		$obj=json_decode($result[1]."}");
		
		$this->urls[18]=$obj->sdURL;
		$this->urls[22]=$obj->hqURL;
		
	}
}


?>