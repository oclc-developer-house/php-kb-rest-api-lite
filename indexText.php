<?php
  include 'kb.php';
  include 'widget.php';
  header('Content-type: application/json');
  $kbService = new kbService("mykey.txt");
  $settings = $kbService->getSettings();
  //echo widget::getSettingsAsTable($settings);
  $kbService->getProviders();
?>
