<?php
class kbResult {
	public $pager;
	public $data;
	
	public function __construct($json, $data) {
		$this->pager = new kbPager($json);
		$this->data = $data;
	}
	
}
?>