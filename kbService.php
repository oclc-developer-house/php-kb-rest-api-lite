<?php
include 'oclcService.php';
include 'oclcData.php';
include 'oclcPager.php';
include 'oclcResult.php';
include 'kbEntry.php';
include 'kbProvider.php';
include 'kbCollection.php';

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
	
	public function getProviders($opt, $pageOpt) {
		$func = "providers";
		$opt = array_merge($this->getDefaultOptions(), $opt);
		$req = $this->getUrl($func, $opt);
		$json = $this->getResponseJson($req);
		$providers = kbProvider::getProviders($json['entries']);
		return new kbResult($json, $providers, $pageOpt);
	}

	public function getCollections($opt, $pageOpt) {
		$func = "collections";
		$opt = array_merge($this->getDefaultOptions(), $opt);
		$req = $this->getUrl($func, $opt);
		$json = $this->getResponseJson($req);
		$collections = kbCollection::getCollections($json['entries']);
		return new kbResult($json, $collections, $pageOpt);
	}

	public function getEntries($opt, $pageOpt) {
		$func = "entries";
		$opt = array_merge($this->getDefaultOptions(), $opt);
		$req = $this->getUrl($func, $opt);
		$json = $this->getResponseJson($req);
		$entries = kbEntry::getEntries($json['entries']);
		return new kbResult($json, $entries, $pageOpt);
	}
}