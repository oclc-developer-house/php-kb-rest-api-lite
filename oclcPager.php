<?php
class oclcPager extends oclcData {
	public $total;
	public $start;
	public $page_size;
	public $result_size;
	public $lastItem;
	public $firstPageIndex;
	public $prevPageIndex;
	public $nextPageIndex;
	public $lastPageIndex;
	
	public function __construct($json_entry) {
	   $this->total = $this->getJson($json_entry, 'os:totalResults');
	   $this->start = $this->getJson($json_entry, 'os:startIndex');
	   $this->page_size = $this->getJson($json_entry, 'os:itemsPerPage');
	   $this->result_size = count($json_entry['entries']);
	   $this->lastItem = $this->start + $this->result_size - 1;
	   $this->firstPageIndex = ($this->start > $this->result_size + 1) ? 1 : null;
	   $this->prevPageIndex  = ($this->start > 1) ? max(1,$this->start - $this->result_size) : null;
	   $this->nextPageIndex  = ($this->lastItem < $this->total) ? $this->start + $this->result_size : null;
	   $this->lastPageIndex  = ($this->lastItem < $this->total - $this->page_size) ? $this->total + 1 - $this->result_size : null;
	}
	
	public function getPaginationSummary($title) {
		echo "{$this->start} - {$this->lastItem} of {$this->total} {$title} ";
	}
	
}

?>