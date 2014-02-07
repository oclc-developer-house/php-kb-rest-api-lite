<?php
class kbResult {
	public $pager;
	public $data;
	public $opt;
	
	public function __construct($json, $data, $opt) {
		$this->data = $data;
		$this->opt = $opt;
		$this->pager = new kbPager($json, $this);
	}

	public function writeLink($index, $label) {
		$opt = array_merge($this->opt);
		$opt['startIndex'] = $index;
		$url = $this->opt['page'];
		$url .= service::makeQuery($opt);
		echo "<a href='{$url}'>{$label}</a> ";
	}
	
}
?>