<?php
class widget {
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
        	foreach($row->getTableValues() as $col) {
        		echo "<td>{$col}</td>";
        	}
        	echo "</tr>";
        }
		echo "</table>";
	}
}
?>