<?php
  include 'kb.php';
  include 'widget.php';
?>
<html>
<body>
<?php  
  $kbService = new kbService("mykey.txt");
  $settings = $kbService->getSettings();
  echo widget::getSettingsAsTable($settings);
?>
</body>
</html>