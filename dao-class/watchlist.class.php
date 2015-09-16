<?php
class WatchList extends DAO{
	private static $instance ;
	function __construct() {
        parent::__construct();
        $this->setTableName('t_nc_item_watchlist') ;
        $this->setPrimaryKey(array('pk_i_item_id','pk_i_user_id')) ;
        $this->setFields( array('pk_i_item_id', 'pk_i_user_id') ) ;
    }

    public static function newInstance() {
        if( !self::$instance instanceof self ) {
            self::$instance = new self ;
        }
            return self::$instance ;
    }

    public function getTable() {
        return DB_TABLE_PREFIX.'t_nc_item_watchlist';
    }

    public function checkTable(){
    	return $this->dao->query("DESCRIBE ".$this->getTable());
    }
    public function import($file) {
        $path = osc_current_web_theme_url($file) ;
        $sql = @file_get_contents($path);
        if(! $this->dao->importSQL($sql) ){
            throw new Exception( $this->dao->getErrorLevel().' - '.$this->dao->getErrorDesc() ) ;
        }
    }
    
    
    public function checkItemAdded($user_id,$item_id){
        $this->dao->select('pk_i_item_id');
        $this->dao->from($this->getTable());
        $this->dao->where(array('pk_i_item_id'=>$item_id,
                                'pk_i_user_id' => $user_id));
        $result=$this->dao->get();
        if( $result->numRows == 0 ) {
            return false;
        }
        return true;    
    }

    public function addToWatchList($item_id,$user_id){
    	$arraySet=array('pk_i_item_id' => $item_id,
                        'pk_i_user_id' => $user_id
                    );
    	return $this->dao->insert($this->getTable(), $arraySet) ;
    }

    public function deleteFromWatchlist($item_id,$user_id){
        return $this->dao->delete($this->getTable(),array('pk_i_item_id'=>$item_id,
                                                    'pk_i_user_id' => $user_id));
    }

    public function countTotal($user_id){
        $result=$this->dao->query('SELECT COUNT(pk_i_item_id) AS count FROM '.$this->getTable().' WHERE pk_i_user_id='.$user_id);
        if(!$result){
            return false;
        }
        $res = $result->row();
        return $res['count'];
    }
    public function userList($user_id){
        $this->dao->select('pk_i_item_id');
        $this->dao->from($this->getTable());
        $this->dao->where(array('pk_i_user_id' => $user_id)  );
        $result = $this->dao->get();
            if( !$result ) {
                return array() ;
            }
            return $result->result();
    }
}
?>