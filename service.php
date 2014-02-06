<?php

class service { 
	protected $inst_id;
	protected $wskey;
	protected $config;
	
	public function __construct($configFile){
		$this->config = parse_ini_file($configFile);
		$this->inst_id = $this->config['inst_id'];
		$this->wskey = $this->config['wskey'];
	}
	
	public $baseUrl = "http://worldcat.org/webservices/";
	public $service = "dummy/rest/";
	public function getUrl($func, $opt = null) {
		if ($opt == null) $opt = $this->getDefaultOptions();
		$url = $this->baseUrl . $this->service . $func;
		if (count($opt) > 0) {
	      $url .= "?";
		  foreach($opt as $k => $v) {
			$url .= $k . "=" . $v . "&";
		  } 	
		}
		return $url; 
	} 
	
	public function getDefaultOptions() {
		return array(
		  "alt" => "json",
		  "wskey" => $this->wskey
		);
	}
	
	public function getResponseJson($req) {
		$ret = file_get_contents($req);
		return json_decode($ret, true);
	}
} 

?> 
