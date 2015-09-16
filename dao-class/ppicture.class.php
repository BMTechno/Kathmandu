<?php
class ProfilePicture extends DAO{
	private static $instance ;
	function __construct() {
        parent::__construct();
        $this->setTableName('t_nc_profile_picture') ;
        $this->setPrimaryKey('pk_i_id') ;
        $this->setFields( array('pk_i_id', 'fk_user_id', 'pic_ext') ) ;
    }

    public static function newInstance() {
        if( !self::$instance instanceof self ) {
            self::$instance = new self ;
        }
            return self::$instance ;
    }

    public function getTable() {
        return DB_TABLE_PREFIX.'t_nc_profile_picture';
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
    public function findPictureExist($user_id){
    	$this->dao->select();
    	$this->dao->from($this->getTable());
    	$this->dao->where('fk_user_id',$user_id);
    	$result=$this->dao->get();
    	if( $result->numRows == 0 ) {
            return false;
        }
        return $result->row()>0?true:false;
    } 
    public function getPictureExt($user_id){
    	$this->dao->select('pic_ext');
    	$this->dao->from($this->getTable());
    	$this->dao->where('fk_user_id',$user_id);
    	$result=$this->dao->get();
        if(isset($result)){
        	if( $result->numRows == 0 ) {
                return array('pic_ext'=>'png','name'=>'default');
            }

        $ext=$result->row();
        $result=array('pic_ext'=>$ext['pic_ext'],'name'=>null);
        return $result;
        }else{
            return null;
        }

    }
    public function checkExtension($user_id,$ext){

    }
    public function updatePictureExt($user_id,$ext){
    	$this->dao->from($this->getTable()) ;
        $this->dao->set(array('pic_ext'=> $ext)) ;
        $this->dao->where(array('pk_i_id' => $user_id)) ;
        return $this->dao->update() ;
    }   
    public function insertPictureData($user_id,$ext){
    	$arraySet=array('pk_i_id' => $user_id,
    					'fk_user_id' => $user_id,
    					'pic_ext'=>$ext);
    	return $this->dao->insert($this->getTable(), $arraySet) ;
    }
}
?>