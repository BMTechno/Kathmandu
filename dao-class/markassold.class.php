<?php
class MarkAsSold extends DAO{
	private static $instance ;
	function __construct() {
        parent::__construct();
        $this->setTableName('t_nc_mark_as_sold') ;
        $this->setPrimaryKey('pk_sold_id') ;
        $this->setFields( array('pk_sold_id') ) ;
    }

    public static function newInstance() {
        if( !self::$instance instanceof self ) {
            self::$instance = new self ;
        }
            return self::$instance ;
    }

    public function getTable() {
        return DB_TABLE_PREFIX.'t_nc_mark_as_sold';
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
    public function MarkThisItem($id){
        $arraySet=array(
                        'pk_sold_id' => $id
                    );
        return $this->dao->insert($this->getTable(), $arraySet) ;
    }
   
    public function selectItemStatus($id){
        $this->dao->select('pk_sold_id');
        $this->dao->from($this->getTable());
        $this->dao->where(array('pk_sold_id'=>$id));
        $results=$this->dao->get();
        if( $results->numRows == 0 ) {
            return false;
        }
        return $results->row()>0?true:false;
    }
    public function RemoveThisItem($id){
        return $this->dao->delete($this->getTable(),array('pk_sold_id' => $id));
    }
}
    ?>