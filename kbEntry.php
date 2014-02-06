<?php
class kbEntry extends kbData {
    public $entry_uid;
    public $entry_status;
    public $bkey;
    public $collection_uid;
    public $collection_name;
    public $provider_uid;
    public $provider_name;
    public $oclcnum;
    public $isbn;
    public $publisher;
    public $coverage;
    public $coverage_enum;
	
	public function __construct($json_entry) {
		$this->entry_uid = $this->getJson($json_entry,'kb:entry_uid');
		$this->entry_status = $this->getJson($json_entry,'kb:entry_status');
		$this->bkey = $this->getJson($json_entry,'kb:bkey');
		$this->collection_uid = $this->getJson($json_entry,'kb:collection_uid');
		$this->collection_name = $this->getJson($json_entry,'kb:collection_name');
		$this->provider_uid = $this->getJson($json_entry,'kb:provider_uid');
		$this->provider_name = $this->getJson($json_entry,'kb:provider_name');
		$this->oclcnum = $this->getJson($json_entry,'kb:oclcnum');
		$this->isbn = $this->getJson($json_entry,'kb:isbn');
		$this->publisher = $this->getJson($json_entry,'kb:publisher');
		$this->coverage = $this->getJson($json_entry,'kb:coverage');
		$this->coverage_enum = $this->getJson($json_entry,'kb:coverage_enum');
	}
	
	public static function getEntries($json_entries) {
		$entries = array();
		foreach($json_entries as $v) {
			$entry = new kbEntry($v);
			$entries[$entry->entry_uid] = $entry;
		}
		return $entries;
	}
	
	public static function getTableHeader() {
		return array(
          "Entry UID",
          "Entry Status",
          "BKey",
          "Collection UID",
          "Collection Name",
          "Provider UID",
          "Provider Name",
          "OCLCNUM",
          "ISBN",
          "Publisher",
          "Coverage",
          "Coverage Enum",
       );
	}

	public function getTableValues() {
		return array(
          $this->entry_uid,
          $this->entry_status,
          $this->bkey,
          $this->collection_uid,
          $this->collection_name,
          $this->provider_uid,
          $this->provider_name,
          $this->oclcnum,
          $this->isbn,
          $this->publisher,
          $this->coverage,
          $this->coverage_enum,
		);
	}

}

?>
