<?php
class PayPal extends DAO{
	private static $instance ;
	function __construct() {
        parent::__construct();
        $this->setTableName('t_nc_paypal') ;
        $this->setPrimaryKey('pk_pp_username') ;
        $this->setFields( array('pk_pp_username', 'pp_password','pp_signature','pp_server','pp_status') ) ;
    }

    public static function newInstance() {
        if( !self::$instance instanceof self ) {
            self::$instance = new self ;
        }
            return self::$instance ;
    }

    public function getTable() {
        return DB_TABLE_PREFIX.'t_nc_paypal';
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
    public function insertPaypalData($username,$password,$signature,$server){
    	$arraySet=array('pk_pp_username' => $username,
                        'pp_password' => $password,
                        'pp_signature' => $signature,
                        'pp_server' => $server,
                        'pp_status' => 'FALSE'
                    );
    	return $this->dao->insert($this->getTable(), $arraySet) ;
    }
    public function selectPaypalData(){
        $this->dao->select();
        $this->dao->from($this->getTable());
        $results=$this->dao->get();
        if(!$results){
            return array();
        }
        return $results->row();
    }
    public function selectStatus(){
        $this->dao->select('pp_status');
        $this->dao->from($this->getTable());
        $results=$this->dao->get();
        if(isset($results)){
            return $results->row();    
        }
        return null;
        
    }
    public function updatePaypalData($username,$password,$signature,$url,$enable,$oldUsername){
        $this->dao->from($this->getTable());
        $aSet=array(
            'pk_pp_username'=>$username,
            'pp_password' => $password,
            'pp_signature' => $signature,
            'pp_server' => $url,
            'pp_status' => $enable
            );
        $this->dao->set($aSet);
        $this->dao->where(array('pk_pp_username'=>$oldUsername)) ;
        return $this->dao->update() ;
    }
    
}
?>