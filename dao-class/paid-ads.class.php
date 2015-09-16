<?php
class PaidAds extends DAO{
	private static $instance ;
	function __construct() {
        parent::__construct();
        $this->setTableName('t_nc_paid_ads') ;
        $this->setPrimaryKey('pk_paid_ads_id') ;
        $this->setFields( array('pk_paid_ads_id') ) ;
    }

    public static function newInstance() {
        if( !self::$instance instanceof self ) {
            self::$instance = new self ;
        }
            return self::$instance ;
    }

    public function getTable() {
        return DB_TABLE_PREFIX.'t_nc_paid_ads';
    }

    public function import($file) {
        $path = osc_current_web_theme_url($file) ;
        $sql = @file_get_contents($path);
        if(! $this->dao->importSQL($sql) ){
            throw new Exception( $this->dao->getErrorLevel().' - '.$this->dao->getErrorDesc() ) ;
        }
    }
    public function checkTable(){
    	return $this->dao->query("DESCRIBE ".$this->getTable());
    }

    public function insertPaidAds($item_id){
        $arraySet=array(
                        'pk_paid_ads_id' => $item_id
                    );
        return $this->dao->insert($this->getTable(), $arraySet) ;
    }
    public function checkExists($item_id){
        
        $result=$this->dao->query('SELECT pk_paid_ads_id FROM '.$this->getTable(). ' WHERE pk_paid_ads_id="'.$item_id.'"');
        if( $result->numRows == 0 ) {
            return false;
        }
        return true;   
    }
    public function selectPaidAdsData(){
        $this->dao->select('pk_paid_ads_id');
        $this->dao->from($this->getTable());
        $results=$this->dao->get();
        if(!$results){
            return array();
        }
        return $results->result();
    }
    public function removeId( $item_id ){
            return $this->dao->delete( $this->getTable(), array('pk_paid_ads_id' => $item_id));
    }
}
?>