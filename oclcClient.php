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
	
	public static function getSettingsAsTable($settings) {
		echo <<< HERE
<table>
<tr>
<th>Property</th>
<th>Value</th>
</tr>
HERE;
        foreach($settings as $k => $v) {
        	echo "<tr><th>{$k}</th><td>{$v}</td></tr>";
        }
		echo <<< HERE
</table>
HERE;
	}
	
	public static function getDetailTable($header, $dataObj) {
		echo "<table><tr><th>Property</th><th>Value</th></tr>";
		foreach($header as $colname => $col) {
			echo "<tr><th>{$col['name']}</th><td>";
			echo $dataObj->getVal($colname);
			echo "</td></tr>";	
		}
		echo "</table>";
	}

	public static function getDataTable($header, $data) {
		echo "<table><tr>";
		foreach($header as $col) {
       		if (!$col['summaryView']) continue;
			echo "<th>{$col['name']}</th>";	
		}
		echo "</tr>";
        foreach($data as $row) {
        	echo "<tr>";
        	$first = true;
        	foreach($header as $colname => $col) {
        		if (!$col['summaryView']) continue;
        		$val = $row->getVal($colname);
        		if ($first) {
        			$first = false;
        		    echo "<th>{$val}</th>";
        		} else {
        		    echo "<td>{$val}</td>";
        		}
        	}
        	echo "</tr>";
        }
		echo "</table>";
	}
}
?>