<?php

$this->load->view('app/header', compact('data'));

if ( isset($views) ) {
    if ( ! is_array($views) ) $views = array ( $views );
    foreach ( $views as $v ) $this->load->view($v, compact('data'));
}

$this->load->view('app/footer', compact('data'));

?>