<?php defined('DACCESS') or die ('Access Denied!');
class test extends Model {

    function __construct() {
        parent::__construct();
    }
    
    //assuming you have a users table

    public function allUsers(){

        $this->database->query('select * from users');
        
        return $this->database->loadObjectList();
    }
	

}