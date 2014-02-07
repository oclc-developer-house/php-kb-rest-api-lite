<?php
  include 'kbService.php';
  include 'widget.php';
?>
<!DOCTYPE html>
<html>
<head>
<style type="text/css">
table {border-collapse: collapse;}
th, td {border: thin solid black; padding:4px; width: 150px;}
</style>
</head>
<body>

<?php  
  if (!isset($_GET['mode'])){
?>
<div>
<form method="get" action="index.php">
  <select name="mode">
    <option value="settings">Settings</option>
    <option value="providers">Providers</option>
    <option value="collections">Collections</option>
    <option value="entries">Entries</option>
  </select>
  <input type="number" name="itemsPerPage" min="10" max="50" step="5" value="10"/>
  <input type="number" name="startIndex" min="1" max="1000000" value="1" />
  <input type="submit"/>
</form>
</div>
<?php  	
  } else {
  	$mode = $_GET['mode'];
  	
  	$opt = array();
  	$pageOpt = array("page" => "index.php");
  	
  	foreach($_GET as $k => $v) {
	    $pageOpt[$k] = $v;
  		if ($k == "mode") continue;
  		$opt[$k] = $v;
  	}
    $kbService = new kbService("mykey.txt");
  	
  	echo "<div><a href='index.php'>Home</a></div>";
  	
  	if ($mode == 'settings') {
      $settings = $kbService->getSettings();
      echo "<h2>KB Settings for {$kbService->getInstId()}</h2>";
      echo widget::getSettingsAsTable($settings);  		
  	} else if ($mode == 'providers') {
      $providers = $kbService->getProviders($opt, $pageOpt);
      echo "<h2>KB Providers for {$kbService->getInstId()}</h2>";
      echo $providers->pager->getPaginationSummary("Providers");
      echo widget::getDataTable(kbProvider::getTableHeader(), $providers->data);  		
  	} else if ($mode == 'collections') {
      $collections = $kbService->getCollections($opt, $pageOpt);
      echo "<h2>KB Collections for {$kbService->getInstId()}</h2>";
      echo $collections->pager->getPaginationSummary("Collections");
      echo widget::getDataTable(kbCollection::getTableHeader(), $collections->data);
  	} else if ($mode == 'entries') {
      $entries = $kbService->getEntries($opt, $pageOpt);
      echo "<h2>KB Entries for {$kbService->getInstId()}</h2>";
      echo $entries->pager->getPaginationSummary("Entries");
      echo widget::getDataTable(kbEntry::getTableHeader(), $entries->data);  		
  	}
  }

?>
</body>
</html>