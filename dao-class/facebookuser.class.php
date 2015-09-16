<?php
class FacebookUser extends DAO{
	private static $instance ;
	function __construct() {
        parent::__construct();
        $this->setTableName('t_nc_facebook_user') ;
        $this->setPrimaryKey('fk_i_user_id') ;
        $this->setFields( array('fk_i_user_id', 'facebook_user_id') ) ;
    }

    public static function newInstance() {
        if( !self::$instance instanceof self ) {
            self::$instance = new self ;
        }
            return self::$instance ;
    }

    public function getTable() {
        return DB_TABLE_PREFIX.'t_nc_facebook_user';
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

    public function insertFacebookUserData($user_id, $facebook_user_id){
    	$arraySet=array('fk_i_user_id' => $user_id,
                        'facebook_user_id' => $facebook_user_id
                    );
    	return $this->dao->insert($this->getTable(), $arraySet) ;
        //return $arraySet;
    }

    public function selectFacebookUserData($id){
        $this->dao->select();
        $this->dao->from($this->getTable());
        $this->dao->where('facebook_user_id', $id);
        $results=$this->dao->get();
        if(!$results){
            return array();
        }
        return $results->row();
    }
}

?>