<?php

    class Landing extends Member_Controller{
        
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            
            $this->load->view('utama');
        }

    }
    

?>