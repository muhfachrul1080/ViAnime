<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

    class My_Controller extends CI_Controller{
        
        public function __construct(){
            
            parent::__construct();
        
        }
    }

    class Admin_Controller extends My_Controller{
        
        public function __construct(){
            
            parent::__construct();

            if($this->session->userdata('status') != 1 )
                redirect(site_url('auth'));
        }
    }

    class Member_Controller extends My_Controller{
        
          public function __construct(){
            
            parent::__construct();

            if($this->session->userdata('status') != 2 )
                redirect(site_url('auth'));
        }
    }

    class User_Controller extends My_Controller{
        
        public function __construct(){
            
            parent::__construct();
        }
    }
    
    
    

?>