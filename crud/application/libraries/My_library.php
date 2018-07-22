<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class My_library {
    var $title = "";
    public function __construct()
    {
        $this->title = "My Title";
    }
    public function test_message(){
        return 'hello form My_library '.$this->title;
    }
    public function initialize($config){
        $this->title = $config['title'];
    }
    public function generate(){
        $htm = "<font color='red' size='20'>$this->title</font>";
        return $htm;
    }
    public function test_db(){
        $CI =& get_instance();
        echo $CI->db->count_all('tblitem');
    }

}