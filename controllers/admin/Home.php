<?php

    class Home extends Admin_Controller{
        
        public function __construct(){
            parent::__construct();

        }

        public function index(){
            $this->load->view('admin/_partialsBootstrap/header');
            $this->load->view('admin/_partialsBootstrap/navbar');
            $this->load->view('admin/admin');
            $this->load->view('admin/_partialsBootstrap/footer');
        }

    }
    


?>