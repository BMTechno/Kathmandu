<?php
class Testimonial extends DAO{
	private static $instance ;
	function __construct() {
        parent::__construct();
        $this->setTableName('t_nc_customer_testimonial') ;
        $this->setPrimaryKey('pk_testimonial_id') ;
        $this->setFields( array('pk_testimonial_id', 'testimonial_title','testimonial_image','testimonial_message') ) ;
    }

    public static function newInstance() {
        if( !self::$instance instanceof self ) {
            self::$instance = new self ;
        }
            return self::$instance ;
    }

    public function getTable() {
        return DB_TABLE_PREFIX.'t_nc_customer_testimonial';
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
    public function insertTestimonialData($title,$message,$image){
    	$arraySet=array('testimonial_title' => $title,
                        'testimonial_image' => $image,
                        'testimonial_message' => $message);
    	return $this->dao->insert($this->getTable(), $arraySet) ;
    }
    public function getTestimonial($testimonial_id){
        $this->dao->select();
        $this->dao->from($this->getTable());
        $this->dao->where(array('pk_testimonial_id' => $testimonial_id));
        $results=$this->dao->get();
        if(!$results){
            return array();
        }
        return $results->row();
    }
    public function updateTestimonial($id,$title,$message,$image){
        $this->dao->from($this->getTable());
        $aSet=array(
            'testimonial_title'=>$title,
            'testimonial_message' => $message,
            'testimonial_image' => $image
            );
        $this->dao->set($aSet);
        $this->dao->where(array('pk_testimonial_id'=>$id)) ;
        return $this->dao->update() ;
    }
    public function TestimonialList(){
        $this->dao->select(array('pk_testimonial_id','testimonial_title'));
        $this->dao->from($this->getTable());
        $result = $this->dao->get();
            if( !$result ) {
                return array() ;
            }
            return $result->result();
    }
     public function deleteTestimonial($id){
        return $this->dao->delete($this->getTable(),array('pk_testimonial_id' => $id));
    }
}
?>