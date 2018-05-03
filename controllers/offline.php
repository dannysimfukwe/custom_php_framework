<?php defined('DACCESS') or die ('Access Denied!');
/**
 * @Author
 * @Danny J Simfukwe
   @Email dannysimfukwe@gmail.com
 */
class Offline extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    public function index() { 
	       
        $data['title'] = 'We are offline'; 
        $data['msg'] = 'Sorry, We are currently offline';

        $this->load->view('offline',compact('data')); 
    

    }




}
