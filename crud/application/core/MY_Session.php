<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once BASEPATH.'/libraries/Session.php';
class MY_Session extends CI_Session {
    function __construct(){
        parent::__construct();
        $this->CI->session = $this;

    }

    function sess_update(){
        echo 'session expired'; die();

    }
}