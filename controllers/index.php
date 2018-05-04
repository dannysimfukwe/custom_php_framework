<?php defined('DACCESS') or die ('Access Denied!');
/**
 * @Author
 * @Danny J Simfukwe
   @Email dannysimfukwe@gmail.com
 */
class index extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    public function index() { 
	       
        $data['title'] = 'index'; 
        $data['msg'] = 'Welcome home';
        $this->load->view('app/template',array('data' => compact('data'), 'views' => 'index')); 
    

    }




}
