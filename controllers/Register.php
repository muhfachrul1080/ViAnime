<?php

    class Register extends CI_Controller {
            
        public function __construct(){
            parent::__construct();
            $this->load->model('user_model');
        }

        public function index(){
            
            $this->load->view('register');
            
        }

        public function tambah(){
            
            $this->form_validation->set_rules('username','Username','required|alpha_numeric|min_length[8]');
            $this->form_validation->set_rules('password','Password','required|alpha_numeric|min_length[8]');
            $this->form_validation->set_rules('email','Email','required|valid_email');
            $this->form_validation->set_rules('nama','Nama','required');

            $post = $this->input->post();

            if($this->form_validation->run() == FALSE){
                $this->load->view('register');
            }
            else{
                $data = array(
                    'user_username' => $post['username'],
                    'user_password' => md5($post['password']),
                    'user_email' => $post['email'],
                    'user_nama' => $post['nama'],
                    'user_level' => $post['level']
                );
                    
                $cek = $this->user_model->insert_to_db('vianime_user', $data);

                redirect('member/landing');
            }
        }
    }

?>
