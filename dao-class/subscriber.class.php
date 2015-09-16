<?php
class Subscriber extends DAO{
	private static $instance ;
	function __construct() {
        parent::__construct();
        $this->setTableName('t_nc_subscriber') ;
        $this->setPrimaryKey('pk_subs_id') ;
        $this->setFields( array('pk_subs_id', 'subs_email') ) ;
    }

    public static function newInstance() {
        if( !self::$instance instanceof self ) {
            self::$instance = new self ;
        }
            return self::$instance ;
    }

    public function getTable() {
        return DB_TABLE_PREFIX.'t_nc_subscriber';
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
    public function SubscribeUser($email){
        $arraySet=array(
                        'subs_email' => $email
                    );
        return $this->dao->insert($this->getTable(), $arraySet) ;
    }
   
    public function checkEmail($email){
        $this->dao->select('subs_email');
        $this->dao->from($this->getTable());
        $this->dao->where(array('subs_email'=>$email));
        $results=$this->dao->get();
        if( $results->numRows == 0 ) {
            return false;
        }
        return true;
    }
    public function RemoveSubscription($email){
        return $this->dao->delete($this->getTable(),array('subs_email' => $email));
    }

    public function listAll(){
        $this->dao->select('subs_email');
        $this->dao->from($this->getTableName());
        $result = $this->dao->get();
        if($result) {
            return $result->result();
        }
        return array();
    }
}
    ?>