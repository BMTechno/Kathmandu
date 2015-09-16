<?php
class WebSMS extends DAO{
	private static $instance ;
	function __construct() {
        parent::__construct();
        $this->setTableName('t_nc_websms') ;
        $this->setPrimaryKey('pk_ws_token') ;
        $this->setFields( array('pk_ws_token', 'ws_signature','ws_server','ws_status') ) ;
    }

    public static function newInstance() {
        if( !self::$instance instanceof self ) {
            self::$instance = new self ;
        }
            return self::$instance ;
    }

    public function getTable() {
        return DB_TABLE_PREFIX.'t_nc_websms';
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
    public function insertWebSMSData($token,$signature,$server){
        $arraySet=array(
                        'pk_ws_token' => $token,
                        'ws_signature' => $signature,
                        'ws_server' => $server,
                        'ws_status' => 'FALSE'
                    );
        return $this->dao->insert($this->getTable(), $arraySet) ;
    }
    public function selectWebSMSData(){
        $this->dao->select();
        $this->dao->from($this->getTable());
        $results=$this->dao->get();
        if(!$results){
            return array();
        }
        return $results->row();
    }
    public function selectStatus(){
        $this->dao->select('ws_status');
        $this->dao->from($this->getTable());
        $results=$this->dao->get();
        if(!$results){
            return array();
        }
        return $results->row();
    }
    public function updateWebSMSData($token,$signature,$server,$enable,$oldToken){
        $this->dao->from($this->getTable());
        $aSet=array(
            'pk_ws_token' => $token,
            'ws_signature' => $signature,
            'ws_server' => $server,
            'ws_status' => $enable
            );
        $this->dao->set($aSet);
        $this->dao->where(array('pk_ws_token'=>$oldToken)) ;
        return $this->dao->update() ;
    }
}
    ?>