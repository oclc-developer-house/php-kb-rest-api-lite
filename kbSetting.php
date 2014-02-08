<?php
class kbSetting extends oclcData {
    public $institution_name;
    public $institution_id;
    public $download_ip;
    public $preferred_oclc_symbol;
    public $google_scholar_enabled;
    public $wcsync_enabled;
    public $marcdelivery_enabled;
    public $marcdelivery_no_delete;
    public $eswitch_enabled;
    public $eswitch_eligible;
    public $article_filter_enabled;
    public $oclc_symbols;
    public $openaccess_in_resolver;
    public $selected_collections;
    public $galesiteid;
    public $title;
	
	public function __construct($json_entry) {
		$this->institution_name = $this->getJson($json_entry,'kb:institution_name');
		$this->institution_id = $this->getJson($json_entry,'kb:institution_id');
		$this->download_ip = $this->getJson($json_entry,'kb:download_ip');
		$this->preferred_oclc_symbol = $this->getJson($json_entry,'kb:preferred_oclc_symbol');
		$this->google_scholar_enabled = $this->getJson($json_entry,'kb:google_scholar_enabled');
		$this->wcsync_enabled = $this->getJson($json_entry,'kb:wcsync_enabled');
		$this->marcdelivery_enabled = $this->getJson($json_entry,'kb:marcdelivery_enabled');
		$this->marcdelivery_no_delete = $this->getJson($json_entry,'kb:marcdelivery_no_delete');
		$this->eswitch_enabled = $this->getJson($json_entry,'kb:eswitch_enabled');
		$this->eswitch_eligible = $this->getJson($json_entry,'kb:eswitch_eligible');
		$this->article_filter_enabled = $this->getJson($json_entry,'kb:article_filter_enabled');
		$this->oclc_symbols = $this->getJson($json_entry,'kb:oclc_symbols');
		$this->openaccess_in_resolver = $this->getJson($json_entry,'kb:openaccess_in_resolver');
		$this->selected_collections = $this->getJson($json_entry,'kb:selected_collections');
		$this->galesiteid = $this->getJson($json_entry,'kb:galesiteid');
		$this->title = $this->getJson($json_entry,'kb:title');
	}
	
	public static function getTableHeader() {
		return array(
            new oclcDataAttr("institution_name", "Institution"), 
            new oclcDataAttr("institution_id", "Institution Id"),
            new oclcDataAttr("download_ip", "Download IP"),
            new oclcDataAttr("preferred_oclc_symbol", "Preferred OCLC Symbol"),
            new oclcDataAttr("google_scholar_enabled", "Google Scholar"),
            new oclcDataAttr("wcsync_enabled", "WCSYNC"),
            new oclcDataAttr("marcdelivery_enabled", "Marc Delivery"),
            new oclcDataAttr("marcdelivery_no_delete", "Marc Delivery No Delete"),
            new oclcDataAttr("eswitch_enabled", "ESwitch Enabled"),
            new oclcDataAttr("eswitch_eligible", "ESwitch Eligible"),
            new oclcDataAttr("article_filter_enabled", "Article Filter Enabled"),
            new oclcDataAttr("oclc_symbols", "OCLC Symbols"),
            new oclcDataAttr("openaccess_in_resolver", "Open Access In Resolver"),
            new oclcDataAttr("selected_collections", "Selected Collections"),
            new oclcDataAttr("galesiteid", "Gale Site Id"),
       );
	}

}

?>
