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
		return array("Provider UID","Provider Name","Available Collections","Selected Collections",
		  "Available Entries", "Selected Entries");
	}

	public function getTableValues() {
		return array(
		  $this->uid,
		  $this->name,
		  $this->available_collections,
		  $this->selected_collections,
		  $this->available_entries,
		  $this->selected_entries
		);
	}

}

?>
