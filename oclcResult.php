<?php
class oclcResult {
	public $pager;
	public $data;
	public $opt;
	public $header;
	
	public function __construct($json, $data, $opt, $header) {
		$this->data = $data;
		$this->opt = $opt;
		$this->header = $header;
		$this->pager = new oclcPager($json);
	}

	public function getPaginationUrl($index) {
		if ($index == null) return null;
		$opt = array_merge($this->opt);
		$opt['startIndex'] = $index;
		$url = $this->opt['page'] . oclcService::makeQuery($opt);
		return $url;
	}
	
}
?>