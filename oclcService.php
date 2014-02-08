<?php
  /*
   * Core class for accessing WorldCat REST API's via JSON
   * Created by terrywbrady at OCLC Developer House 2014.
   */

class oclcService { 
	protected $inst_id;
	protected $wskey;
	protected $config;
	
	public function __construct($configFile){
		$this->config = parse_ini_file($configFile);
		$this->inst_id = $this->config['inst_id'];
		$this->wskey = $this->config['wskey'];
	}
	
	public function getInstId() {return $this->inst_id;}
	public $baseUrl = "http://worldcat.org/webservices/";
	public $service = "dummy/rest/";
	public function getUrl($func, $opt = null) {
		if ($opt == null) $opt = $this->getDefaultOptions();
		$url = $this->baseUrl . $this->service . $func;
		$url .= oclcService::makeQuery($opt);
		return $url;
	} 
	
	public static function makeQuery($opt) {
		$q = "";
		if (count($opt) > 0) {
	      $q .= "?";
		  foreach($opt as $k => $v) {
			$q .= $k . "=" . $v . "&";
		  } 	
		}
		return $q; 
		
	}
	
	public function getDefaultOptions() {
		return array(
		  "alt" => "json",
		  "institution_id" => $this->inst_id,
		  "wskey" => $this->wskey
		);
	}
	
	public function getResponseRaw($req) {
		$ret = file_get_contents($req);
		return $ret;
	}

	public function getResponseJson($req) {
		$ret = file_get_contents($req);
		return json_decode($ret, true);
	}
} 

?> 
