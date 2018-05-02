<?php defined('DACCESS') or die ('Access Denied!');
/**
 * Class System Setup, here you can add custom configs and
 * access later using Application::loadConfig('property');
 */
class Config {

    public $offline     = 0;
    public $encoding    = 'UTF-8';
    public $language    = 'en_US';
    public $log_path    = 'logs';
    public $cache       = 0;
    public $cache_path  = 'cache';
    public $cache_time  = '3600';
    public $debug       = 0;
    public $compress    = 1;
	public $mobile    =  0;
}
