<?php
class oclcData {
		
    public function getJson($entry, $key, $default = "") {
		if (isset($entry[$key])) return $entry[$key];
		return $default;
	}
	
	public function getVal($key) {
		$arr = get_object_vars($this);
		return $arr[$key];
	}
	
	public function getLinkOptions($key) {
		return array();
	}
	
}

class oclcDataAttr {
	public $id;
	public $name;
	public $summaryView;
	
	public function __construct($id, $name, $summaryView = false) {
		$this->id = $id;
		$this->name = $name;
		$this->summaryView = $summaryView;
	}
}