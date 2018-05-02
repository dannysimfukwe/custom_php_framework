<?php defined('DACCESS') or die ('Access Denied!');

/**
 * Check if files in a directory have been altered.
 */
class integrity {
    
    protected $_path;
    protected $_tree = array();
    
    /**
     * Class constructor.
     * @param string $path
     */
    public function __construct($path = null) {
        $this->setPath($path);
    }
    
    /**
     * Set the path.
     * @param string $path
     */
    public function setPath($path = null){
        if(!$path){
            $path = "/";
        }
        if(substr($path,-1) != "/"){
           $this->_path = $path."/"; 
        } else {
            $this->_path = $path;
        }
    }
    
	
	public function ago($i = ''){
	$m = time()-$i; $o='just now';
	$t = array('year'=>31556926,'month'=>2629744,'week'=>604800,
	'day'=>86400,'hour'=>3600,'minute'=>60,'second'=>1);
	foreach($t as $u=>$s){
	if($s<=$m){$v=floor($m/$s); $o="$v $u".($v==1?'':'s').' ago'; break;}
	}
	return $o;
	}
	
	public function getYouTubeIdFromURL($url)
	{
	$url_string = parse_url($url, PHP_URL_QUERY);
	parse_str($url_string, $args);
	return isset($args['v']) ? $args['v'] : false;
	}


	function secondsToTime($seconds)
	{
	    // extract hours
	    $hours = floor($seconds / (60 * 60));
	 
	    // extract minutes
	    $divisor_for_minutes = $seconds % (60 * 60);
	    $minutes = floor($divisor_for_minutes / 60);
	 
	    // extract the remaining seconds
	    $divisor_for_seconds = $divisor_for_minutes % 60;
	    $seconds = ceil($divisor_for_seconds);
	 
	    // return the final array
	    $obj = array(
	        "h" => (int) $hours,
	        "m" => (int) $minutes,
	        "s" => (int) $seconds,
	    );
	    return $obj;
	}

    /**
     * Check the MD5 file signatures and crosses with file 
     * given for diff.
     * @param string $file filename
     * @return array 
     */
    public function checkMD5Hashes($file){
        if (!is_readable($file)) {
            return FALSE;
        }
        $file = file($file);
        $hashes = array();
        foreach ($file as $line) {
            $temp = explode(' ', $line);
            $hashes[trim($temp[1])] = $temp[0];
        }
        $modifies = array();
        $this->_getFileList();
        /* search added files */
        foreach($this->_tree as $key => $value){
            if(!array_key_exists($key, $hashes)) {
                $modifies[] = $this->_getFileStats($key,'added');  
            }
        }
        /* search deleted files */
        foreach($hashes as $key => $value){            
            if(!array_key_exists($key, $this->_tree)) {
                $modifies[] = $this->_reportFileMissing($key); 
            }
        }
        /* search modified files */
        foreach($this->_tree as $key => $value){
            if(array_key_exists($key, $hashes)) {
                if($value != $hashes[$key]){
                    $modifies[] = $this->_getFileStats($key,'modified');
                }
            }
        }
        
        return $modifies; 
    }   
    
    /**
     * Generate a file with md5 signature of the files 
     * of the given directory.
     * @param string $file
     * @return boolean
     */
    public function getMD5Hashes($file = null){
        if(!isset($file)){
            $file = "md5".DS.date('YmdHis').".md5";
        }
        $hashes = '';
        $this->_getFileList();
        foreach ($this->_tree as $key => $value){
            $hashes .= $value." ".$key."\n";
        }
        return file_put_contents($file, $hashes);
    }
    
    /**
     * Generate an array with path, name and signature of each file MD5 
     * in the entered path.
     * @param string $path
     * @return boolean
     */
    private function _getFileList($path = null){
        if(!$path){
            $path = $this->_path;
        }
        if(!is_dir($path)){
            return FALSE;
        }
        $root = opendir($path);
        while($entry = readdir($root)) {
            if ($entry != "." && $entry != "..") {
                if (is_dir($path.$entry)){
                    $this->_getFileList($path.$entry."/");
                } else {
                    $this->_tree[str_replace($this->_path,"",$path.$entry)] = md5_file($path.$entry);
                }
            } 
        }
        closedir($root);
        return $this->_tree;
    }
    
    /**
     * Get the metadata for a given file.
     * @param string $file
     * @return array
     */
    private function _getFileStats($file,$stat){
        if(is_readable($this->_path.$file)) {
            $mdata = stat($this->_path.$file);
            return array(
                'filename' => $file,
                'stat' => $stat,
                'uid' => $mdata[4], 
                'gid' => $mdata[5], 
                'size' => $mdata[7],
                'lastAccess' => date('Y-m-d H:i:s',$mdata[8]),
                'lastModification' => date('Y-m-d H:i:s',$mdata[9])
            ); 
        }
    }
    
    /**
     * Declares a file as deleted.
     * @params string $file
     * @return array
     */
    private function _reportFileMissing($file){
        return array(
            'filename' => $file,
            'stat' => 'deleted',
            'uid' => null, 
            'gid' => null, 
            'size' => null,
            'lastAccess' => null,
            'lastModification' => null
        );
    }
	public function is_mobile() {
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	$mobile_agents = Array(


		"240x320",
		"acer",
		"acoon",
		"acs-",
		"abacho",
		"ahong",
		"airness",
		"alcatel",
		"amoi",	
		"android",
		"anywhereyougo.com",
		"applewebkit/525",
		"applewebkit/532",
		"asus",
		"audio",
		"au-mic",
		"avantogo",
		"becker",
		"benq",
		"bilbo",
		"bird",
		"blackberry",
		"blazer",
		"bleu",
		"cdm-",
		"compal",
		"coolpad",
		"danger",
		"dbtel",
		"dopod",
		"elaine",
		"eric",
		"etouch",
		"fly " ,
		"fly_",
		"fly-",
		"go.web",
		"goodaccess",
		"gradiente",
		"grundig",
		"haier",
		"hedy",
		"hitachi",
		"htc",
		"huawei",
		"hutchison",
		"inno",
		"ipad",
		"ipaq",
		"ipod",
		"jbrowser",
		"kddi",
		"kgt",
		"kwc",
		"lenovo",
		"lg ",
		"lg2",
		"lg3",
		"lg4",
		"lg5",
		"lg7",
		"lg8",
		"lg9",
		"lg-",
		"lge-",
		"lge9",
		"longcos",
		"maemo",
		"mercator",
		"meridian",
		"micromax",
		"midp",
		"mini",
		"mitsu",
		"mmm",
		"mmp",
		"mobi",
		"mot-",
		"moto",
		"nec-",
		"netfront",
		"newgen",
		"nexian",
		"nf-browser",
		"nintendo",
		"nitro",
		"nokia",
		"nook",
		"novarra",
		"obigo",
		"palm",
		"panasonic",
		"pantech",
		"philips",
		"phone",
		"pg-",
		"playstation",
		"pocket",
		"pt-",
		"qc-",
		"qtek",
		"rover",
		"sagem",
		"sama",
		"samu",
		"sanyo",
		"samsung",
		"sch-",
		"scooter",
		"sec-",
		"sendo",
		"sgh-",
		"sharp",
		"siemens",
		"sie-",
		"softbank",
		"sony",
		"spice",
		"sprint",
		"spv",
		"symbian",
		"tablet",
		"talkabout",
		"tcl-",
		"teleca",
		"telit",
		"tianyu",
		"tim-",
		"toshiba",
		"tsm",
		"up.browser",
		"utec",
		"utstar",
		"verykool",
		"virgin",
		"vk-",
		"voda",
		"voxtel",
		"vx",
		"wap",
		"wellco",
		"wig browser",
		"wii",
		"windows ce",
		"wireless",
		"xda",
		"xde",
		"zte"
	);


	$is_mobile = false;

	foreach ($mobile_agents as $device) {

		if (stristr($user_agent, $device)) {

			$is_mobile = $device;

			break;
		}
	}

	return $is_mobile;
}

public function mask($number, $mask = '*') {
    return str_repeat($mask, strlen($number) - 4) . substr($number, -4);
}

}