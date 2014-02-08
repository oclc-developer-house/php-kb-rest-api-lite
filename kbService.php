<?php
include 'oclcService.php';
include 'oclcData.php';
include 'oclcPager.php';
include 'oclcResult.php';
include 'kbSetting.php';
include 'kbEntry.php';
include 'kbProvider.php';
include 'kbCollection.php';

class kbService extends oclcService {
	public function __construct($configFile) {
		parent::__construct($configFile);
		$this->service = "kb/rest/";
	}
	
	public function getSettings($opt, $pageOpt) {
		$req = $this->getUrl("settings/" . $this->inst_id);
		$json = $this->getResponseJson($req);
		$settings = new kbSetting($json);
        return new oclcResult($json, $settings, $pageOpt, kbSetting::getTableHeader());
	}
	
	public function getProviders($opt, $pageOpt) {
		$func = "providers";
		$opt = array_merge($this->getDefaultOptions(), $opt);
		$req = $this->getUrl($func, $opt);
		$json = $this->getResponseJson($req);
		$providers = kbProvider::getProviders($json['entries']);
		return new oclcResult($json, $providers, $pageOpt, kbProvider::getTableHeader());
	}

	public function getProviderByUid($uid, $opt, $pageOpt) {
		$func = "providers/{$uid}";
		$opt = array_merge($this->getDefaultOptions(), $opt);
		$req = $this->getUrl($func, $opt);
		$json = $this->getResponseJson($req);
		$provider = new kbProvider($json);
		return new oclcResult($json, $provider, $pageOpt, kbProvider::getTableHeader());
	}


	public function getCollections($opt, $pageOpt) {
		$func = "collections";
		$opt = array_merge($this->getDefaultOptions(), $opt);
		$req = $this->getUrl($func, $opt);
		$json = $this->getResponseJson($req);
		$collections = kbCollection::getCollections($json['entries']);
		return new oclcResult($json, $collections, $pageOpt, kbCollection::getTableHeader());
	}

	public function getEntries($opt, $pageOpt) {
		$func = "entries";
		$opt = array_merge($this->getDefaultOptions(), $opt);
		$req = $this->getUrl($func, $opt);
		$json = $this->getResponseJson($req);
		$entries = kbEntry::getEntries($json['entries']);
		return new oclcResult($json, $entries, $pageOpt, kbEntry::getTableHeader());
	}
}