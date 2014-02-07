<?php
class kbCollection extends oclcData {
	public $title;
	public $provider_uid;
	public $provider_name;
	public $collection_uid;
	public $owner_institution;
	public $source_institution;
	public $collection_status;
	public $collection_type;
	public $title_link_template;
	public $linkscheme;
	public $uhf_version;
	public $wcsync_enabled;
	public $marcdelivery_enabled;
	public $marcdelivery_no_delete;
	public $google_scholar_enabled;
	public $open;
	public $available_entries;
	public $selected_entries;
	public $localstem;
	
	public function __construct($json_entry) {
	   $this->title = $this->getJson($json_entry, 'title');
	   $this->provider_uid = $this->getJson($json_entry, 'kb:provider_uid');
	   $this->provider_name = $this->getJson($json_entry, 'kb:provider_name');
	   $this->collection_uid = $this->getJson($json_entry, 'kb:collection_uid');
	   $this->owner_institution = $this->getJson($json_entry, 'kb:owner_institution');
	   $this->source_institution = $this->getJson($json_entry, 'kb:source_institution');
	   $this->collection_status = $this->getJson($json_entry, 'kb:collection_status');
	   $this->collection_type = $this->getJson($json_entry, 'kb:collection_type');
	   $this->title_link_template = $this->getJson($json_entry, 'kb:title_link_template');
	   $this->linkscheme = $this->getJson($json_entry, 'kb:linkscheme');
	   $this->uhf_version = $this->getJson($json_entry, 'kb:uhf_version');
	   $this->wcsync_enabled = $this->getJson($json_entry, 'kb:wcsync_enabled');
	   $this->marcdelivery_enabled = $this->getJson($json_entry, 'kb:marcdelivery_enabled');
	   $this->marcdelivery_no_delete = $this->getJson($json_entry, 'kb:marcdelivery_no_delete');
	   $this->google_scholar_enabled = $this->getJson($json_entry, 'kb:google_scholar_enabled');
	   $this->open = $this->getJson($json_entry, 'kb:open');
	   $this->available_entries = $this->getJson($json_entry, 'kb:available_entries');
	   $this->selected_entries = $this->getJson($json_entry, 'kb:selected_entries');
	   $this->localstem = $this->getJson($json_entry, 'kb:localstem');
	}
	
	public static function getCollections($json_entries) {
		$collections = array();
		foreach($json_entries as $v) {
			$collection = new kbCollection($v);
			$collections[$collection->collection_uid] = $collection;
		}
		return $collections;
	}
	
	public static function getTableHeader() {
		return array(
          "Title",
          "Provider UID",
          "Provider Name",
          "Collection UID",
          //"Owner Institution",
          //"Source Institution",
          //"Collection Status",
          //"Collection Type",
          //"Title Link Template",
          //"Link Scheme",
          //"UHF Version",
          //"WCSYNC enabled",
          //"MARC Delivery Enabled",
          //"MARC Delivery No Delete",
          //"Google Scholar Enabled",
          //"Open",
          "Available Entries",
          "Selected Entries",
          //"Local Stem",
       );
	}

	public function getTableValues() {
		return array(
	      $this->title,
	      $this->provider_uid,
	      $this->provider_name,
	      $this->collection_uid,
	      //$this->owner_institution,
	      //$this->source_institution,
	      //$this->collection_status,
	      //$this->collection_type,
	      //$this->title_link_template,
	      //$this->linkscheme,
	      //$this->uhf_version,
	      //$this->wcsync_enabled,
	      //$this->marcdelivery_enabled,
	      //$this->marcdelivery_no_delete,
	      //$this->google_scholar_enabled,
	      //$this->open,
	      $this->available_entries,
	      $this->selected_entries,
	      //$this->localstem,
		);
	}

}

?>
