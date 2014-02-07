<?php
class oclcResult {
	public $pager;
	public $data;
	public $opt;
	
	public function __construct($json, $data, $opt) {
		$this->data = $data;
		$this->opt = $opt;
		$this->pager = new oclcPager($json);
	}

	public function getPaginationUrl($index) {
		if ($index == null) return null;
		$opt = array_merge($this->opt);
		$opt['startIndex'] = $index;
		$url = $this->opt['page'];
		$url .= service::makeQuery($opt);
		return $url;
	}
	
}
?>