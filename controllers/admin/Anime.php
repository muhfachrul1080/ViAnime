<?php

    class Anime extends Admin_Controller{
        
        public function __construct(){
            
            parent::__construct();

        }

        public function index(){
            $data['table'] = $this->load->view('template/plain_table',null,TRUE);

            $this->load->view('admin/_partialsBootstrap/header');
            $this->load->view('admin/_partialsBootstrap/navbar');
            $this->load->view('admin/anime/anilist', $data);
            $this->load->view('admin/_partialsBootstrap/footer');
        }

        public function tampil_tambah(){
            $this->load->view('admin/_partialsBootstrap/header');
            $this->load->view('admin/_partialsBootstrap/navbar');
            $this->load->view('admin/anime/aniadd');
            $this->load->view('admin/_partialsBootstrap/footer');
        }

        public function tambah()
        {
            echo 'ini adalah tambah';
        }

    }
    


?>