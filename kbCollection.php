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
		    "title" => array(
		        "name" => "Collection Title",
		        "summaryView" => true,
		    ),
		    "provider_uid" => array(
		        "name" => "Provider UID",
		        "summaryView" => true,
		    ),
		    "provider_name" => array(
		        "name" => "Provider Name",
		        "summaryView" => true,
		    ),
		    "collection_uid" => array(
		        "name" => "Collection UID",
		        "summaryView" => true,
		    ),
	        "owner_institution" => array(
                "name" => "Owner Institution", 
                "summaryView" => false
            ),
	        "source_institution" => array(
                "name" => "Source Institution", 
                "summaryView" => false
            ),
	        "collection_status" => array(
                "name" => "Collection Status", 
                "summaryView" => false
            ),
	        "collection_type" => array(
                "name" => "Collection Type", 
                "summaryView" => false
            ),
	        "title_link_template" => array(
                "name" => "Title Link Template", 
                "summaryView" => false
            ),
	        "linkscheme" => array(
                "name" => "Link Scheme", 
                "summaryView" => false
            ),
	        "uhf_version" => array(
                "name" => "UHF Version", 
                "summaryView" => false
            ),
	        "wcsync_enabled" => array(
                "name" => "WCSYNC Enabled", 
                "summaryView" => false
            ),
	        "marcdelivery_enabled" => array(
                "name" => "Marc Delivery Enabled", 
                "summaryView" => false
            ),
	        "marcdelivery_no_delete" => array(
                "name" => "Marc Delivery No Delete", 
                "summaryView" => false
            ),
	        "google_scholar_enabled" => array(
                "name" => "Google Scholar Enabled", 
                "summaryView" => false
            ),
	        "open" => array(
                "name" => "Open", 
                "summaryView" => false
            ),
	        "available_entries" => array(
                "name" => "Available Entries", 
                "summaryView" => true
            ),
	        "selected_entries" => array(
                "name" => "Selected Entries", 
                "summaryView" => true
            ),
	        "localstem" => array(
                "name" => "Local Stem", 
                "summaryView" => false
            ),
        ); 
	}

}

?>
