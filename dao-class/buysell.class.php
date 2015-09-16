<?php
class BuySell extends DAO{
	private static $instance ;
	function __construct() {
        parent::__construct();
        $this->setTableName('t_nc_buy_sell') ;
        $this->setPrimaryKey('pk_bs_id') ;
        $this->setFields( array('pk_bs_id', 'fk_item_id') ) ;
    }

    public static function newInstance() {
        if( !self::$instance instanceof self ) {
            self::$instance = new self ;
        }
            return self::$instance ;
    }

    public function getTable() {
        return DB_TABLE_PREFIX.'t_nc_buy_sell';
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
    public function insertBuySellData($item_id){
    	$arraySet=array('fk_item_id' => $item_id);
    	return $this->dao->insert($this->getTable(), $arraySet) ;
    }
    public function checkItemExist($item_id){
        $this->dao->select('pk_bs_id');
        $this->dao->from($this->getTable());
        $this->dao->where('fk_item_id',$item_id);
        $result=$this->dao->get();
        if( $result->numRows == 0 ) {
            return false;
        }
        return true;
    }
}
?>