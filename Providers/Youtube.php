<?php
class Youtube extends Hoster {

	function Youtube($url) {
		$this->url=$url;
		
		$pattern = '/.*youtube.*(v=|\/v\/)([^&\/]*).*/i';
		preg_match($pattern, $this->url, $matches);
		$videoId = $matches[2];
		
		$json=($this->getpage("http://www.youtube.com/watch?v=".$videoId));
		
		preg_match('|"url_encoded_fmt_stream_map": "(.*?)"|U', $json, $result);
		
		
		$json=json_decode(" { \"args\": { ".$result[0]."}");
		
		$urls=urldecode($json->args->url_encoded_fmt_stream_map);
		
		$ar=explode('url=', $urls);
		
	
		
		
		foreach($ar as $u){
			$a=explode(';',$u);
			$u=$a[0];
		
			if(substr($u,strlen($u)-1,1)==",") {
				$u=substr($u,0,strlen($u)-1);
			}
			
			preg_match('|&itag=([0-9]{1,2}+)|U', $u, $itags);
			
			$itag=$itags[1];
			$u=str_replace($itags[0],'',$u).$itags[0];
			
			if($itag && $u) $this->urls[$itag]=$u;
		}
		
		
	}
	
}
?>