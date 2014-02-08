<?php
class kbProvider extends oclcData {
	public $uid;
	public $name;
	public $available_collections;
	public $selected_collections;
	public $available_entries;
	public $selected_entries;
	
	public function __construct($json_entry) {
		$this->uid = $this->getJson($json_entry,'kb:provider_uid');
		$this->name = $this->getJson($json_entry,'kb:provider_name');
		$this->available_collections = $this->getJson($json_entry,'kb:available_collections');
		$this->selected_collections = $this->getJson($json_entry,'kb:selected_collections');
		$this->available_entries = $this->getJson($json_entry,'kb:available_entries');
		$this->selected_entries = $this->getJson($json_entry,'kb:selected_entries');
	}
	
	public static function getProviders($json_entries) {
		$providers = array();
		foreach($json_entries as $v) {
			$provider = new kbProvider($v);
			$providers[$provider->uid] = $provider;
		}
		return $providers;
	}
	
	public static function getTableHeader() {
		return array(
		    new oclcDataAttr("uid", "Provider UID", true),
		    new oclcDataAttr("name", "Provider Name", true),
		    new oclcDataAttr("available_collections", "Available Collections", true),
		    new oclcDataAttr("selected_collections", "Selected Collections", true),
		    new oclcDataAttr("available_entries", "Available Entries", true),
		    new oclcDataAttr("selected_entries", "Selected Entries", true),
        ); 
	}
	
	public function getLinkOptions($key) {
		if ($key == "uid") {
			return array("mode" => "providerUid", "uid" => $this->uid);
		}
		return array();
	}
	
}

?>
