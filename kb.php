<?php
include 'service.php';
include 'kbProvider.php';

class kbService extends service {
	public function __construct($configFile) {
		parent::__construct($configFile);
		$this->service = "kb/rest/";
	}
	
	public function getSettings() {
		$req = $this->getUrl("settings/" . $this->inst_id);
		$json = $this->getResponseJson($req);
		$settings = array();
        foreach($json as $k => $v) {
       	    $m = array();
       	    if (preg_match("/^kb:(.*)$/", $k, $m)) {
                $settings[$m[1]] = $v;      		
       	    }
        }
        return $settings;
	}
	
	public function getProviders() {
		$opt = $this->getDefaultOptions();
		$opt['itemsPerPage'] = 10000;
		$req = $this->getUrl("providers");
		$json = $this->getResponseJson($req);
		$providers = kbProvider::getProviders($json['entries']);
		return $providers;
	}
}