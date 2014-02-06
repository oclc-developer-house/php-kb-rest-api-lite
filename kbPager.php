<?php
class kbPager extends kbData {
	public $total;
	public $start;
	public $page_size;
	public $result_size;
	
	public function __construct($json_entry) {
	   $this->total = $this->getJson($json_entry, 'os:totalResults');
	   $this->start = $this->getJson($json_entry, 'os:startIndex');
	   $this->page_size = $this->getJson($json_entry, 'os:itemsPerPage');
	   $this->result_size = count($json_entry['entries']);
	}
	
	public function getPaginationSummary($title) {
		$end = $this->start + $this->result_size - 1;
		echo "{$this->start} - {$end} of {$this->total} {$title}";
	}
}

?>