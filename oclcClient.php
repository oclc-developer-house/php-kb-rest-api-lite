<?php
class oclcClient {
	public $page;
	public $serviceOpt;
	public $pageOpt;
	
	public function __construct($page, $get) {
		$this->page = $page;   
  	    $this->serviceOpt = array();
  	    $this->pageOpt = array("page" => $page);
  	
  	    foreach($get as $k => $v) {
	        $this->pageOpt[$k] = $v;
  		    if ($k == "mode") continue;
  		    if ($k == "uid") continue;
  		    $this->serviceOpt[$k] = $v;
  	    }
	}
	
	public function getKey($k, $def = "") {
		if (isset($this->pageOpt[$k])) { 
		    return $this->pageOpt[$k];
		}
		return $def;
	}
	
	public function hasKey($k) {
		$mode = $this->getKey($k);
		return ($mode != "");
	}
	
	public function writeHomeLink() {
		echo "<div><a href='{$this->page}'>Home</a></div>";
	}
	
	public function getPaginationSummary($result, $title) {
		$this->writeLink($result->getPaginationUrl($result->pager->firstPageIndex), "<<");
		$this->writeLink($result->getPaginationUrl($result->pager->prevPageIndex), "<");
		$result->pager->getPaginationSummary($title);
		$this->writeLink($result->getPaginationUrl($result->pager->nextPageIndex), ">");
		$this->writeLink($result->getPaginationUrl($result->pager->lastPageIndex), ">>");
	}
	
	public function writeLink($url, $label) {
		if ($url == null) return;
		echo "<a href='{$url}'>{$label}</a> ";
	}
	
	public function getTable($result) {
		if (is_array($result->data)) {
			$this->getDataTable($result);
		} else {
		    $this->getDetailTable($result);	
		}
	}


	public function getDetailTable($result) {
		echo "<table><tr><th>Property</th><th>Value</th></tr>";
		foreach($result->header as $col) {
			echo "<tr><th>{$col->name}</th><td>";
			echo $result->data->getVal($col->id);
			echo "</td></tr>";	
		}
		echo "</table>";
	}

	public function getDataTable($result) {
		echo "<table><tr>";
		foreach($result->header as $col) {
       		if (!$col->summaryView) continue;
			echo "<th>{$col->name}</th>";	
		}
		echo "</tr>";
        foreach($result->data as $row) {
        	echo "<tr>";
        	$first = true;
        	foreach($result->header as $col) {
        		if (!$col->summaryView) continue;
        		$val = $row->getVal($col->id);
        		$tag = ($first) ? "th" : "td";
        		$link = $row->getLinkOptions($col->id);
        		$url = $this->page . oclcService::makeQuery($link);
       		    echo "<{$tag}>";
       		    if (count($link) > 0) echo "<a href='{$url}'>";
       		    echo $val;
       		    if (count($link) > 0) echo "</a>";
       		    echo "</{$tag}>";
       			$first = false;
        	}
        	echo "</tr>";
        }
		echo "</table>";
	}
}
?>