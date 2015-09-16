<?php
class Shoutbox extends DAO{
	private static $instance ;
	function __construct() {
        parent::__construct();
        $this->setTableName('t_nc_shoutbox') ;
        $this->setPrimaryKey('pk_sb_message_id');
        $this->setFields( array('pk_sb_message_id','sb_message', 'sb_username','sb_time') ) ;
    }

    public static function newInstance() {
        if( !self::$instance instanceof self ) {
            self::$instance = new self ;
        }
            return self::$instance ;
    }

    public function getTable() {
        return DB_TABLE_PREFIX.'t_nc_shoutbox';
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
    
    public function insertMessage($message,$username,$time){
    	$arraySet=array('sb_message' => $message,
                        'sb_username' => $username,
                        'sb_time' => $time);
        if(! $this->dao->insert($this->getTable(), $arraySet) ){
             return ( $this->dao->getErrorLevel().' - '.$this->dao->getErrorDesc() ) ;
        }
        return true;
    	
    }
    public function countTotal(){
        $result=$this->dao->query('SELECT COUNT(pk_sb_message_id) AS count FROM '.$this->getTable());
        if(!$result){
            return $this->dao->getErrorLevel().' - '.$this->dao->getErrorDesc();
        }
        $res = $result->row();
        return $res['count'];
    }
    
    public function deleteOldest(){
        $result=$this->dao->query('DELETE FROM '.$this->getTable().' WHERE pk_sb_message_id NOT IN (SELECT * FROM (SELECT pk_sb_message_id FROM '.$this->getTable().' ORDER BY pk_sb_message_id DESC LIMIT 0, 30) as sb)');
        if(!$result){
            return $this->dao->getErrorLevel().' - '.$this->dao->getErrorDesc() ;
        }
        
        return $result;
    }
    public function fetchResult(){
        $result=$this->dao->query('SELECT * FROM '.$this->getTable().' ORDER BY pk_sb_message_id ASC');
        if(!$result){
            return $this->dao->getErrorLevel().' - '.$this->dao->getErrorDesc() ;
        }
        
        return $result->result();
    }
    
    /*
    public function checkItemExist($item_id){
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