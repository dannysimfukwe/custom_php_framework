<?php defined('DACCESS') or die ('Access Denied!');
/**
 * @Author
 * @Danny J Simfukwe
   @Email dannysimfukwe@gmail.com
 */
class error404 extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    public function index() { 
	       
        $data['title'] = 'Page Not Found'; 
        $data['msg'] = 'Sorry, we could not find the page you were looking for';

        $this->load->view('app/template',
                        array('data' => compact('data'), 
                        'views' => '404')); 
    

    }

}
