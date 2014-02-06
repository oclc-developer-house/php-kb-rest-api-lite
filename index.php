<?php
  include 'kb.php';
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
      $providers = $kbService->getProviders();
      echo "<h2>KB Providers for {$kbService->getInstId()}</h2>";
      echo widget::getDataTable(kbProvider::getTableHeader(), $providers);  		
  	} else if ($mode == 'collections') {
      $collections = $kbService->getCollections();
      echo "<h2>KB Collections for {$kbService->getInstId()}</h2>";
      echo widget::getDataTable(kbCollection::getTableHeader(), $collections);
  	} else if ($mode == 'entries') {
      $entries = $kbService->getEntries();
      echo "<h2>KB Entries for {$kbService->getInstId()}</h2>";
      echo widget::getDataTable(kbEntry::getTableHeader(), $entries);  		
  	}
  }

?>
</body>
</html>