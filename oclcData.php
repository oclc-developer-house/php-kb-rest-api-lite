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
	
}