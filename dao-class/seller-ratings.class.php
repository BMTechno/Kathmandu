<?php
class SellerRatings extends DAO{
	private static $instance ;
	function __construct() {
        parent::__construct();
        $this->setTableName('t_nc_seller_ratings') ;
        $this->setPrimaryKey('pk_i_seller_id') ;
        $this->setFields( array('pk_i_seller_id', 'pk_i_user_id', 'vote_given') ) ;
    }

    public static function newInstance() {
        if( !self::$instance instanceof self ) {
            self::$instance = new self ;
        }
            return self::$instance ;
    }

    public function getTable() {
        return DB_TABLE_PREFIX.'t_nc_seller_ratings';
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
    
    
    public function checkSameUserOnSeller($user_id,$seller_id){
        $this->dao->select('pk_i_seller_id');
        $this->dao->from($this->getTable());
        $this->dao->where(array('pk_i_seller_id'=>$seller_id,
                                'pk_i_user_id' => $user_id));
        $result=$this->dao->get();
        if( $result->numRows == 0 ) {
            return false;
        }
        return true;    
    }

    public function insertRatingsData($seller_id,$user_id,$vote_given){
    	$arraySet=array('pk_i_seller_id' => $seller_id,
                        'pk_i_user_id' => $user_id,
                        'vote_given' => $vote_given
                    );
    	return $this->dao->insert($this->getTable(), $arraySet) ;
    }
    public function updateRatingsData($seller_id,$user_id,$vote_given){
    	$this->dao->from($this->getTable());
        $aSet=array('vote_given' => $vote_given);
        $this->dao->set($aSet);
        $this->dao->where(array('pk_i_seller_id'=>$seller_id,
                                'pk_i_user_id' => $user_id)) ;
        return $this->dao->update() ;
    }
    public function getSellerTotal($seller_id){
    	$result=$this->dao->query('SELECT SUM(vote_given) AS sum, COUNT(pk_i_seller_id) AS count FROM '.$this->getTable().' WHERE pk_i_seller_id='.$seller_id);
        if(!$result){
            return false;
        }
        return $result->row();
    }
}
?>