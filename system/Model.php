<?php defined('DACCESS') or die ('Access Denied!');
/**
 * Main data model, inherited from the other models.
 */
class Model {
    
    public function __construct(){
        //do something
    }
    
    /**
     * Return the property of the main controller.
     * @param type $key
     * @return type
     */
    public function __get($key) {
		$instance =& Controller::getInstance();
		return $instance->$key;
	}
    
}
