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
		    "uid" => array(
		        "name" => "Provider UID",
		        "summaryView" => true,
		    ),
		    "name" => array(
		        "name" => "Provider Name",
		        "summaryView" => true,
		    ),
		    "available_collections" => array(
		        "name" => "Available Collections",
		        "summaryView" => true,
		    ),
		    "selected_collections" => array(
		        "name" => "Selected Collections",
		        "summaryView" => true,
		    ),
		    "available_entries" => array(
		        "name" => "Available Entries",
		        "summaryView" => true,
		    ),
		    "selected_entries" => array(
		        "name" => "Selected Entries",
		        "summaryView" => true,
		    ),
        ); 

	}
}

?>
