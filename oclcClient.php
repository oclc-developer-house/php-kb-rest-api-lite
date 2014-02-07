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
	
	public static function getDataTable($header, $data) {
		echo "<table><tr>";
		foreach($header as $v) echo "<th>{$v}</th>";
		echo "</tr>";
        foreach($data as $row) {
        	echo "<tr>";
        	$first = true;
        	foreach($row->getTableValues() as $col) {
        		if ($first) {
        			$first = false;
        		    echo "<th>{$col}</th>";
        		} else {
        		    echo "<td>{$col}</td>";
        		}
        	}
        	echo "</tr>";
        }
		echo "</table>";
	}
}
?>