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

        protected function POST($name){
            return $this->input->post($name);
        }

        protected function GET($name,$clean=false){
            return $this->input->get($name,$clean);
        }

        protected function METHOD(){
            return $this->input->method();
        }

        protected function flashmsg($msg,$type='success',$name='msg'){
        return $this->session->set_flashdata($name, '<div class="alert font-weight-normal alert-'
        .$type.' alert-dismissable"> <a href="#" class="close" data-dismiss="alert"
         aria-label="close">&times;</a>'.$msg.'</div>');
        }

        protected function upload($id,$directory,$tag_name='usefile',$max_size=0){
        if(isset($_FILES[$tag_name]) && !empty($_FILES[$tag_name['name']])){

            @unlink($upload_path . '/' . $id . '.jpg');
			$config = array(
				'file_name' 		=> $id . '.jpg',
				'allowed_types'		=> 'jpg|png|bmp|jpeg',
                'upload_path'		=> $upload_path
                'max_size'          =>$max_size
			);
			$this->load->library('upload');
			$this->upload->initialize($config);
			return $this->upload->do_upload($tag_name);
		}
		return FALSE;
        }

        protected function upload_file($name,$directory,$tag_name='usefile',$max_size=0){
            if(isset($_FILES[$tag_name]) && !empty($_FILES[$tag_name['name']])){
    
                @unlink($upload_path . '/' . $name );
                $config = array(
                    'file_name' 		=> $name . '.jpg',
                    'allowed_types'		=> '*',
                    'upload_path'		=> $upload_path
                    'max_size'          =>$max_size
                );
                $this->load->library('upload');
                $this->upload->initialize($config);
                return $this->upload->do_upload($tag_name);
            }
            return FALSE;
            }

            public function upload_file2($name, $directory, $tag_name = 'userfile')
	{
		if ($_FILES[$tag_name])
		{
			$upload_path = realpath(APPPATH . '../assets/img/' . $directory . '/');
			@unlink($upload_path . '/' . $name);
			$config = array(
				'file_name' 		=> $name ,
				'allowed_types'		=> '*',
				'upload_path'		=> $upload_path
			);
			$this->load->library('upload');
			$this->upload->initialize($config);
            return $this->upload->do_upload($tag_name);
            return $_FILES[$tag_name]['name'];
		}
		return FALSE;
	}
        
	public function dump($var)
	{
		echo '<pre>';
		var_dump($var);
		echo '</pre>';
    }
    
    }

?>