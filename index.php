<?php
  include 'kbService.php';
  include 'widget.php';
?>
<html>
<body>

<?php  
  if (!isset($_GET['mode'])){
?>
<div>
<ul>
  <li><a href=".?mode=settings">Settings</a></li>
  <li><a href=".?mode=providers">Providers</a></li>
  <li><a href=".?mode=collections">Collections</a></li>
  <li><a href=".?mode=entries">Entries</a></li>
</ul>
</div>
<?php  	
  } else {
  	$mode = $_GET['mode'];
    $kbService = new kbService("mykey.txt");
  	
  	if ($mode == 'settings') {
      $settings = $kbService->getSettings();
      echo "<h2>KB Settings for {$kbService->getInstId()}</h2>";
      echo widget::getSettingsAsTable($settings);  		
  	} else if ($mode == 'providers') {
      $providers = $kbService->getProviders(50);
      echo "<h2>KB Providers for {$kbService->getInstId()}</h2>";
      echo $providers->pager->getPaginationSummary("Providers");
      echo widget::getDataTable(kbProvider::getTableHeader(), $providers->data);  		
  	} else if ($mode == 'collections') {
      $collections = $kbService->getCollections(50);
      echo "<h2>KB Collections for {$kbService->getInstId()}</h2>";
      echo $collections->pager->getPaginationSummary("Collections");
      echo widget::getDataTable(kbCollection::getTableHeader(), $collections->data);
  	} else if ($mode == 'entries') {
      $entries = $kbService->getEntries(50);
      echo "<h2>KB Entries for {$kbService->getInstId()}</h2>";
      echo $entries->pager->getPaginationSummary("Entries");
      echo widget::getDataTable(kbEntry::getTableHeader(), $entries->data);  		
  	}
  }

?>
</body>
</html>