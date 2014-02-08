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
		    new oclcDataAttr("title", "Collection Title", true),
		    new oclcDataAttr("provider_uid", "Provider UID", true),
		    new oclcDataAttr("provider_name", "Provider Name", true),
		    new oclcDataAttr("collection_uid", "Collection UID", true),
	        new oclcDataAttr("owner_institution", "Owner Institution"),
	        new oclcDataAttr("source_institution", "Source Institution"),
	        new oclcDataAttr("collection_status", "Collection Status"),
	        new oclcDataAttr("collection_type", "Collection Type"),
	        new oclcDataAttr("title_link_template", "Title Link Template"),
	        new oclcDataAttr("linkscheme", "Link Scheme"),
	        new oclcDataAttr("uhf_version", "UHF Version"),
	        new oclcDataAttr("wcsync_enabled", "WCSYNC Enabled"),
	        new oclcDataAttr("marcdelivery_enabled", "Marc Delivery Enabled"),
	        new oclcDataAttr("marcdelivery_no_delete", "Marc Delivery No Delete"),
	        new oclcDataAttr("google_scholar_enabled", "Google Scholar Enabled"),
	        new oclcDataAttr("open", "Open"),
	        new oclcDataAttr("available_entries", "Available Entries"),
	        new oclcDataAttr("selected_entries", "Selected Entries", true),
	        new oclcDataAttr("localstem", "Local Stem"),
        ); 
	}

	public function getLinkOptions($key) {
		if ($key == "collection_uid") {
			return array("mode" => "collectionUid", "uid" => $this->collection_uid);
		}
		if ($key == "provider_name") {
			return array("mode" => "providerUid", "uid" => $this->provider_uid);
		}
		if ($key == "selected_entries") {
			return array("mode" => "entries", "collection_uid" => $this->collection_uid);
		}
		return array();
	}

}

?>
