<?php
  /*
   * Data object base class containing convenience methods for reading JSON.
   * Created by terrywbrady at OCLC Developer House 2014.
   */

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

  /*
   * Configuration class defining the attributes of an oclcData object.
   * Created by terrywbrady at OCLC Developer House 2014.
   */

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