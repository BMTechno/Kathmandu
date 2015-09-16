<?php
class UniqueCounter extends DAO{
	private static $instance ;
	function __construct() {
        parent::__construct();
        $this->setTableName('t_nc_unique_counter') ;
        $this->setPrimaryKey('pk_i_id') ;
        $this->setFields( array('pk_i_id', 'ip', 'time_stamp') ) ;
    }

    public static function newInstance() {
        if( !self::$instance instanceof self ) {
            self::$instance = new self ;
        }
            return self::$instance ;
    }

    public function getTable() {
        return DB_TABLE_PREFIX.'t_nc_unique_counter';
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
    
    
    public function checkSameUserViewing($item_id,$user_ip){
        $this->dao->select('pk_i_id');
        $this->dao->from($this->getTable());
        $this->dao->where(array('pk_i_id'=>$item_id,
                                'ip' => $user_ip));
        $result=$this->dao->get();
        if( $result->numRows == 0 ) {
            return false;
        }
        return true;  
    }
    
    public function AddViewCounter($item_id,$ip){
    	$arraySet=array('pk_i_id' => $item_id,
                        'ip' => $ip
                        );
    	return $this->dao->insert($this->getTable(), $arraySet) ;
        
    }
    
    public function UpdateViewCounter($item_id,$ip){
    	$this->dao->from($this->getTable());
        $this->dao->where(array('pk_i_id'=>$item_id,
                                'ip' => $ip)) ;
        return $this->dao->update() ;
    }
    
    public function getItemUniqueView($item_id){
    	$result=$this->dao->query('SELECT COUNT(pk_i_id) AS count FROM '.$this->getTable().' WHERE pk_i_id="'.$item_id.'"');
        if(!$result){
            return 0;
        }
        $results=$result->row();
        return $results['count'];
    }

    public function getItemView24Hours($item_id){
        $result=$this->dao->query('SELECT COUNT(pk_i_id) AS count FROM '.$this->getTable().' WHERE pk_i_id="'.$item_id.'" AND time_stamp >= now() - INTERVAL 1 DAY');
        if(!$result){
            return 0;
        } 
        $results=$result->row();
        return $results['count'];
    }
}
?>