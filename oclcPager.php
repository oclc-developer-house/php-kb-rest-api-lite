<?php
class kbPager extends kbData {
	public $total;
	public $start;
	public $page_size;
	public $result_size;
	private $result;
	
	public function __construct($json_entry, $result) {
	   $this->total = $this->getJson($json_entry, 'os:totalResults');
	   $this->start = $this->getJson($json_entry, 'os:startIndex');
	   $this->page_size = $this->getJson($json_entry, 'os:itemsPerPage');
	   $this->result_size = count($json_entry['entries']);
	   $this->result = $result;
	}
	
	public function getPaginationSummary($title) {
		$end = $this->start + $this->result_size - 1;
		if ($this->start > 1) {
		  $this->result->writeLink(1,"<<");	
		}
		if ($this->start > 1 + $this->page_size) {
		  $this->result->writeLink($this->start - $this->page_size,"<");
		}
		echo "{$this->start} - {$end} of {$this->total} {$title} ";
		if ($this->start + $this->page_size < $this->total - $this->page_size) {
		  $this->result->writeLink($this->start + $this->page_size,">");	
		}
		if ($this->start + $this->page_size < $this->total) {
		  $this->result->writeLink($this->total + 1 - $this->page_size,">>");	
		}
	}
	
}

?>