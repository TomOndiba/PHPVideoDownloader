<?php
abstract class Hoster {
	protected $urls=array();
	protected $url;
	public function urls() {
		return $this->urls;
	}
	
	
	protected function getpage($url) {
		return @file_get_contents($url);
	}

}
?>