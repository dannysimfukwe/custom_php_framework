<?php defined('DACCESS') or die ('Access Denied!');

/**
 * Class to control the system url.
 */

class Url {

    /**
     * Class constructor
     */
    public function __construct() {
        // do something
    }
    
    /**
     * Returns the base URL of the system
     * @return string
     */
    public static function basePath(){
        return substr($_SERVER['PHP_SELF'],0,-9);
    }
    
    /**
     * Create a route based on the URL of the system
     * @param string $path
     */
    public static function setUrl($path){
        $basepath = self::basePath();
        echo $basepath.$path;
    }

    /**
     * Redirect to a given page.
     * @param string $page
     */
    public static function redirect($page){
        $basepath = self::basePath();
        header('Location: '.$basepath.$page);
    }
}

