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
	       
        $data['title'] = 'Leads Ge App Login'; 

        $this->load->view('pages/login',$data); 
    

    }




}
