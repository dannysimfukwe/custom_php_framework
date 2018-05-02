<?php defined('DACCESS') or die ('Access Denied!');

/**
 * Manages variables text replacements.
 */
class Language {
    
    private $default;
    
    /**
     * Set the default language
     */
    public function __construct() {
        $this->default = Application::loadConfig('language');
    }

    /**
     * Remplace a variable with the correct text/word.
     * @param string $ref
     */
    public function translate($ref,$capitalize = null){
        if(isset($_SESSION['language'])) {
            if(!@include $this->loadLanguage($_SESSION['language'])){
                echo "Error loading ".$_SESSION['language']." translation";
            }
        } else {
            if(!@include $this->loadLanguage($this->default)){
                echo "Error loading ".$this->default." translation";
            }
        }
        if(array_key_exists($ref, $dictionary)){
            if(isset($capitalize)){
                echo $this->transform($dictionary[$ref],$capitalize);
            }else {
               return $dictionary[$ref];
            }
        } else {
            echo "Translation not found";
        }
    }
    
    /**
     * Capitalize the text
     * @param string $string
     * @param string $type
     * @return boolean
     */
    private function transform($string,$type){
        if(!isset($string)){
            return FALSE;
        }
        switch ($type) {
            case 'UPPER':
                return strtoupper($string);
            case 'LOWER':
                return strtolower($string);
            case 'WORDS':
                return ucwords($string);
            case 'FIRST':
                return ucfirst($string);
        }
    }
    
    /**
     * Load the requested laguage file. 
     * @param string $lang codigo de lenguaje
     * @return array
     */
    private function loadLanguage($lang){
        return LANG_PATH.DS.$lang.'.php';
    }
}
