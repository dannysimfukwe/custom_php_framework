<?php defined('DACCESS') or die ('Access Denied!');

class Pagination {
    
    private $total;
    private $perpage;
    private $pages;
    private $url;
    private $current;
    private $params;
    
    /**
     * Set the current url.
     */
    public function __construct() {
        $this->current = $_SERVER['REQUEST_URI'];
    }
    
    public function configure($total, $perpage, $url,$params){
        $this->total    = $total;
        $this->perpage  = $perpage;
        $this->url      = $url;
        $this->pages    = ceil($total / $perpage);
        $this->params   = $params;
    }
    

    public function buildPagination(){
        $pagination = array();
        for($i=0;$i<$this->pages;$i++){
            $url = $this->url.$this->params.$this->perpage * ($i);
            $base = Url::basePath().$this->url;
            if($this->current == Url::basePath().$url || $this->current == $base && $i == 0){ 
                $active = TRUE;
            } else {
                $active = FALSE;
            }
            $pagination[$i] = (object) array(
                'num'       => $i+1,
                'link'      => $url,
                'active'    => $active
            );
        }
        return $pagination;
    }
    
    
}
