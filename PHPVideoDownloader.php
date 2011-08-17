<?php

require_once 'Providers/Hoster.php'; //Abstract class

//Video Providers classes
require_once 'Providers/Dailymotion.php';
require_once 'Providers/Youtube.php';
require_once 'Providers/Vimeo.php';


class PHPVideoDownloader {
	
	private $stealer;
	private $url;
	public function PHPVideoDownloader($url) {
		
		$this->url=$url;
		
	}

	public function get(){
		$patterns['Youtube'] = '/.*youtube.*(v=|\/v\/)([^&\/]*).*/i';
		
		$patterns['Dailymotion'] ='/.*dailymotion.com\/video\/.*/i';
		
		$patterns['Vimeo']='/.*vimeo.com\/.*/i';
		
		foreach($patterns as $class=>$pattern) {
			preg_match($pattern, $this->url, $matches);
			
			
			if(count($matches)>0) {
				$curclass=$class;
				break;
			}
		}
		
		if($curclass) {
			$this->stealer=new $curclass($this->url);
			return $this->stealer;
		}
		else return null;
	}
}








?>