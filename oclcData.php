<?php
class oclcData {
		
    public function getJson($entry, $key, $default = "") {
		if (isset($entry[$key])) return $entry[$key];
		return $default;
	}
	
}