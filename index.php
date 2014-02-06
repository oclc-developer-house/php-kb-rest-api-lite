<?php
  include 'kb.php';
  include 'widget.php';
?>
<html>
<body>
<?php  
  $kbService = new kbService("mykey.txt");

  $settings = $kbService->getSettings();
  echo "<h2>KB Settings for {$kbService->getInstId()}</h2>";
  echo widget::getSettingsAsTable($settings);

  $providers = $kbService->getProviders();
  echo "<h2>KB Providers for {$kbService->getInstId()}</h2>";
  echo widget::getDataTable(kbProvider::getTableHeader(), $providers);

  $collections = $kbService->getCollections();
  echo "<h2>KB Collections for {$kbService->getInstId()}</h2>";
  echo widget::getDataTable(kbCollection::getTableHeader(), $collections);

?>
</body>
</html>