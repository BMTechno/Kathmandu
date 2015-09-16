<?php
class FacebookClassified extends DAO{
	private static $instance ;
	function __construct() {
        parent::__construct();
        $this->setTableName('t_nc_facebook') ;
        $this->setPrimaryKey('pk_fb_api_id') ;
        $this->setFields( array('pk_fb_api_id', 'fb_api_secret', 'fb_status','fb_connection') ) ;
    }

    public static function newInstance() {
        if( !self::$instance instanceof self ) {
            self::$instance = new self ;
        }
            return self::$instance ;
    }

    public function getTable() {
        return DB_TABLE_PREFIX.'t_nc_facebook';
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
    public function insertFacebookData($api_id,$api_secret,$connection){
    	$arraySet=array('pk_fb_api_id' => $api_id,
                        'fb_api_secret' => $api_secret,
                        'fb_connection' => $connection,
                        'fb_status' => 'FALSE'
                    );
    	return $this->dao->insert($this->getTable(), $arraySet) ;
        //return $arraySet;
    }
    public function selectFacebookData(){
        $this->dao->select();
        $this->dao->from($this->getTable());
        $results=$this->dao->get();
        if(!$results){
            return array();
        }
        return $results->row();
    }
    public function selectStatus(){
        $this->dao->select('fb_status');
        $this->dao->from($this->getTable());
        $results=$this->dao->get();
        return $results->row();
    }
    public function updateFacebookData($api_id,$api_secret,$enable,$connection,$old_api_id){
        $this->dao->from($this->getTable());
        $aSet=array(
            'pk_fb_api_id'=>$api_id,
            'fb_api_secret' => $api_secret,
            'fb_status' => $enable,
            'fb_connection' => $connection
            );
        $this->dao->set($aSet);
        $this->dao->where(array('pk_fb_api_id'=>$old_api_id)) ;
        return $this->dao->update() ;
    }

    
}
?>