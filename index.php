<?php
  include 'kbService.php';
  include 'oclcClient.php';

  $kbService = new kbService("mykey.txt");
  $oclcClient = new oclcClient("index.php", $_GET);
?>
<!DOCTYPE html>
<html>
<head>
<style type="text/css">
table {border-collapse: collapse;}
th, td {border: thin solid black; padding:4px; width: 150px;}
label {width: 150px;display:block;float:left;}
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
function opts() {
	$("div.opt").hide();
	$(document).find("div."+$("#mode").val()).show();
}
$(document).ready(function(){
	opts();
	$("#mode").change(function(){opts();})
});
</script>
</head>
<body>

<?php  
  if (!$oclcClient->hasKey('mode')){
?>
  <div>
  <form method="get" action="index.php">
    <div>
      <label for="mode">Knowledge Base Api</label>
      <select id="mode" name="mode">
        <option value="settings">Settings</option>
        <option value="providers">Providers</option>
        <option value="collections">Collections</option>
        <option value="entries">Entries</option>
      </select>
    </div>
    <div class="opt providers collections entries">
      <label for="itemsPerPage">Items Per Page</label>
      <input id="itemsPerPage" type="number" name="itemsPerPage" min="10" max="50" step="5" value="10"/>
    </div>
    <div class="opt providers collections entries">
      <label for="startIndex">Start Index</label>
      <input id="startIndex" class="opt providers collections entries" type="number" name="startIndex" min="1" max="1000000" value="1" />
    </div>
    <input type="submit"/>
  </form>
  </div>
<?php  	
  } else {
  	$mode = $oclcClient->getKey('mode');
  	$oclcClient->writeHomeLink();
  	
  	if ($mode == 'settings') {
      $settings = $kbService->getSettings();
      
      echo "<h2>KB Settings for {$kbService->getInstId()}</h2>";
      echo $oclcClient->getSettingsAsTable($settings);  		
  	} else if ($mode == 'providers') {
      $providers = $kbService->getProviders($oclcClient->serviceOpt, $oclcClient->pageOpt);
      
      echo "<h2>KB Providers for {$kbService->getInstId()}</h2>";
      echo $oclcClient->getPaginationSummary($providers, "Providers");
      echo $oclcClient->getDataTable(kbProvider::getTableHeader(), $providers->data);  		
  	} else if ($mode == 'collections') {
      $collections = $kbService->getCollections($oclcClient->serviceOpt, $oclcClient->pageOpt);
      
      echo "<h2>KB Collections for {$kbService->getInstId()}</h2>";
      echo $oclcClient->getPaginationSummary($collections, "Collections");
      echo $oclcClient->getDataTable(kbCollection::getTableHeader(), $collections->data);
  	} else if ($mode == 'entries') {
      $entries = $kbService->getEntries($oclcClient->serviceOpt, $oclcClient->pageOpt);
      
      echo "<h2>KB Entries for {$kbService->getInstId()}</h2>";
      echo $oclcClient->getPaginationSummary($entries, "Entries");
      echo $oclcClient->getDataTable(kbEntry::getTableHeader(), $entries->data);  		
  	}
  }

?>
</body>
</html>