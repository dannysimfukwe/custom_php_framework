<?php defined('DACCESS') or die ('Access Denied!');

/* Establish error levels */
date_default_timezone_set('UTC');
error_reporting(E_ALL & ~E_STRICT & ~E_NOTICE);

/* Import the definition file paths. */
if(!include 'includes/defines.php'){
    die ("Error loading defines.php");
}

/* Load the main system libraries. */
spl_autoload_register(function ($class) {
    if(!require SYSTEM_PATH. $class . '.php'){
        echo "Error loading ".$class." class";
    }
});
