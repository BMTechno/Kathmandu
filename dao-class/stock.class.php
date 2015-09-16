<?php
class StockInHand extends DAO{
	private static $instance ;
	function __construct() {
        parent::__construct();
        $this->setTableName('t_nc_stock_in_hand') ;
        $this->setPrimaryKey('pk_i_item_id') ;
        $this->setFields( array('pk_i_item_id', 'sih_quantity','stock_object') ) ;
    }

    public static function newInstance() {
        if( !self::$instance instanceof self ) {
            self::$instance = new self ;
        }
            return self::$instance ;
    }

    public function getTable() {
        return DB_TABLE_PREFIX.'t_nc_stock_in_hand';
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
    
    public function insertQty($item_id,$qty,$is_stock){
        if($qty==''){
            $qty=0;
        }
        if($is_stock=='on'){
            $is=true;
        }else{
            $is=false;
        }
    	$arraySet=array('pk_i_item_id' => $item_id['fk_i_item_id'],
                        'sih_quantity' => $qty,
                        'stock_object' => $is);
    	return $this->dao->insert($this->getTable(), $arraySet) ;
    }
    public function checkItemExist($item_id){
        $this->dao->select('pk_i_item_id');
        $this->dao->from($this->getTable());
        $this->dao->where('pk_i_item_id',$item_id);
        $result=$this->dao->get();
        if($result->numRows==0){
            return false;
        }
        return true;
    }
    public function checkStockable($item_id){
        $this->dao->select('stock_object');
        $this->dao->from($this->getTable());
        $this->dao->where('pk_i_item_id',$item_id);
        $result=$this->dao->get();
        if($result->numRows==0){
            return false;
        }
        $res = $result->row();
        return $res['stock_object'];
    }
    public function getStock($item_id){
        $this->dao->select('sih_quantity');
        $this->dao->from($this->getTable());
        $this->dao->where('pk_i_item_id',$item_id);
        $result=$this->dao->get();
        if($result->numRows==0){
            return 0;
        }
        $res=$result->row();
        return $res['sih_quantity'];
    }
    /*public function checkItemExist($item_id){
        $this->dao->select('pk_bs_id');
        $this->dao->from($this->getTable());
        $this->dao->where('fk_item_id',$item_id);
        $result=$this->dao->get();
        if( $result->numRows == 0 ) {
            return false;
        }
        return true;
    }*/
}
?>