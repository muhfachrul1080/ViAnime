<?php

    class Auth extends CI_Controller {
        
        public function __construct(){
            parent::__construct();
            $this->load->model('user_model');
        }

        public function index(){
            $this->load->view('admin/login');
        }

        function validation(){
            
            $this->form_validation->set_rules('username','Username','required|alpha_numeric|min_length[8]');
            $this->form_validation->set_rules('password','Password','required|alpha_numeric|min_length[8]');

            if($this->form_validation->run() == FALSE){
                $this->load->view('admin/login');
            }
            else {
                $post = $this->input->post();
                $where = array(
                    'user_username' => $post['username'],
                    'user_password' => md5($post['password'])
                );

                $row = $this->user_model->cek_login('vianime_user', $where)->row();

                if(isset($row)){
                    if($row->user_level == 1){

                        $data_session = array(
                            'nama' => $post['username'],
                            'status' => 1,
                        );

                        $this->session->set_userdata($data_session);

                        redirect(site_url('admin/home'));
                    }
                    else if ($row->user_level == 2){

                        $data_session = array(
                            'nama' => $post['username'],
                            'status' => 2,
                        );

                        $this->session->set_userdata($data_session);

                        redirect(site_url('member/landing'));
                    }
                    
                }
                else {
                    $this->session->set_flashdata('message', 'Username dan Password Salah');
                    redirect(site_url('auth'));
                }
            }

        }

        public function logout(){
            $this->session->sess_destroy();
            redirect(site_url('auth'));
        }

    }
    
?>