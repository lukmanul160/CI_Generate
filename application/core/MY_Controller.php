<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class MY_Controller extends CI_Controller{

        public $title='';

        public __construct(){
            parent :: __construct();
            // $this->load->library('lib_log');
            date_default_timezone_set("Asia/Jakarta");
        } 

        protected function template($data,$module=''){
            $data=['global_title']=$this->title;
            $data['module']=$module;
            if(strlen($module)>0) return $this->laod->view($module,'/includes/layout',$data);
            return $this->load->view('includes/layout',$data);
        }

    }

?>