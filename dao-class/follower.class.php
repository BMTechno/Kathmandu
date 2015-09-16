<?php
class Follower extends DAO{
	private static $instance ;
	function __construct() {
        parent::__construct();
        $this->setTableName('t_nc_follow_seller') ;
        $this->setPrimaryKey('pk_seller_id','pk_follower_id') ;
        $this->setFields( array('pk_seller_id','pk_follower_id') ) ;
    }

    public static function newInstance() {
        if( !self::$instance instanceof self ) {
            self::$instance = new self ;
        }
            return self::$instance ;
    }

    public function getTable() {
        return DB_TABLE_PREFIX.'t_nc_follow_seller';
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
    
    public function insertFollow($u,$s){
    	$user=(int)$u;
    	$seller=(int)$s;
        $arraySet=array(
                        'pk_follower_id' => $user,
                        'pk_seller_id' => $seller
                    );
        $r= $this->dao->insert($this->getTable(), $arraySet) ;
        return $r;
    }
   
    public function checkExist($u,$s){
        $this->dao->select('pk_seller_id');
        $this->dao->from($this->getTable());
        $this->dao->where(array('pk_follower_id'=>$u,
        						'pk_seller_id' => $s));
        $results=$this->dao->get();
        if( $results->numRows == 0 ) {
            return false;
        }
        return $results->row()>0?true:false;
    }
    public function deleteFollow($seller,$follower){
        return $this->dao->delete($this->getTable(),array('pk_seller_id' => $seller,'pk_follower_id', $follower));
    }
    
}
    ?>