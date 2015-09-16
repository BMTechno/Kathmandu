<?php
class OfferItem extends DAO{
	private static $instance ;
	function __construct() {
        parent::__construct();
        $this->setTableName('t_nc_offer_item') ;
        $this->setPrimaryKey('pk_o_id') ;
        $this->setFields( array('pk_o_id', 'fk_user_id', 'fk_item_id','o_date_time','o_detail') ) ;
    }

    public static function newInstance() {
        if( !self::$instance instanceof self ) {
            self::$instance = new self ;
        }
            return self::$instance ;
    }

    public function getTable() {
        return DB_TABLE_PREFIX.'t_nc_offer_item';
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
    public function insertOfferData($user_id,$item_id, $offer){
    	$arraySet=array('fk_user_id' => $user_id,
    					'fk_item_id' => $item_id,
    					'o_detail'=>$offer);
    	return $this->dao->insert($this->getTable(), $arraySet) ;
    }
}
?>