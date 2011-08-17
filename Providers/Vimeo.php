<?php
class Vimeo extends Hoster {

	function Vimeo($url) {
		$this->url=$url;
		$json=$this->getpage($this->url);
		
		preg_match('|targ_clip_id:(.*?),|U', $json, $result);
		$clipid=trim($result[1]);
	
		
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://www.vimeo.com/moogaloop/load/clip:'.$clipid);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
		$xml = curl_exec($ch);
		
		$clipid=$this->gettag($xml, 'nodeId');
		
		
		
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://www.vimeo.com/moogaloop/play/clip:'.$clipid.'/'.$this->gettag($xml, 'request_signature').'/'.$this->gettag($xml, 'request_signature_expires').'/?q=hd');
		curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
		$a = curl_exec($ch);
		
		if(preg_match('#Location: (.*)#', $a, $r))
		 $l = trim($r[1]);
		 
		 echo $l;
	}
	
	private function gettag($xml,$tag) {
		preg_match('|<'.$tag.'>(.*?)</'.$tag.'>|U', $xml, $result);
		
		return trim($result[1]);
	}
	
}
?>