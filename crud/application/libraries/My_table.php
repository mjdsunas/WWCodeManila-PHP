<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class My_table {
    var $title = "";
    var $str = "";
    var $config = array();
    public function __construct()
    {
        $this->title = "My Title";
        $this->config['htm_table'] = "<table border='1' width='500'>";
    }
    public function  load_config($config){
        $this->config = $config;
    }
    public function initialize($table, $fields){
        $CI =& get_instance();
        $q = $CI->db->select($fields)->get($table);       
        $items = $q->result();
        $this->str = $this->config['htm_table'];
        foreach($items as $item){
            $this->str.='<tr>';
            foreach($fields as $field){
                $this->str.='<td>'.$item->$field.'</td>';
            }
            $this->str.='</tr>';
        }
        $this->str.='</table>';
    }
    public function generate(){
        return $this->str;
    }
}