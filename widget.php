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
	
}
?>