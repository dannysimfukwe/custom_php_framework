<?php defined('DACCESS') or die ('Access Denied!');
/**
 * Class configuration for the database.
 */
class DefaultDB {
    public $driver = 'mysql';
    public $dbhost = '127.0.0.1';
    public $dbuser = 'root';
    public $dbpass = '12345678';
    public $dbname = 'framework';
    public $prefix = 'pfx_';
}

/**
 * Custom connection class, you can create as many as you want
 * each one for a diferent database connection.
 */
class Custom {
    public $driver = 'mysql';
    public $dbhost = 'localhost';
    public $dbuser = 'root';
    public $dbpass = 'root';
    public $dbname = 'test';
    public $prefix = 'pfx_';
}