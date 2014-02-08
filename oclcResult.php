<?php
  /*
   * Wrapper object for data returned by the kbService class.
   * In addition to the raw data that is returned, object of this class contain additional data to format
   * output and to generate links between pages of data and associated objects.
   * Created by terrywbrady at OCLC Developer House 2014.
   */
class oclcResult {
	public $pager;
	public $data;
	public $opt;
	public $header;
	
	public function __construct($json, $data, $opt, $header) {
		$this->data = $data;
		$this->opt = $opt;
		$this->header = $header;
		$this->pager = new oclcPager($json);
	}

	public function getPaginationUrl($index) {
		if ($index == null) return null;
		$opt = array_merge($this->opt);
		$opt['startIndex'] = $index;
		$url = $this->opt['page'] . oclcService::makeQuery($opt);
		return $url;
	}
	
}
?>