<?php defined('DACCESS') or die ('Access Denied!');
/**
 * Main application controller, this inherites all other drivers.
 */
class Controller {
    
    private static $instance;
    
    /**
     * Constructor of the main Controller.
     */
    public function __construct() {
        self::$instance =& $this;
        // init the dinamic loader
        $this->load =& Application::loadClass('Load', SYSTEM_PATH);
        // init the system logger 
        $this->logger =& Application::loadClass('Logger', SYSTEM_PATH);
        // import the autoload list
        if(!@include INCLUDE_PATH."autoload.php"){
            echo "Error loading autoload.php";
        }
        // load the default classes
        if(count($classes)>0){
            foreach($classes as $class => $directory ){
                $object = strtolower($class);
                $this->$object = Application::loadClass($class, $directory);
            }
        }
    }
    
    /**
     * Return the controller instance.
     * @return object 
     */
    public static function &getInstance(){
		return self::$instance;
	}  
   
}
