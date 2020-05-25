<?php
    class Users extends CI_Controller{
        public function register(){
            $data['title'] = 'Sign Up';

            $this->form_validation->set_rules('username', 'Name', 'required|callback_check_username_exists');
            //$this->form_validation->set_rules('first_name', 'First name', 'required');
            //$this->form_validation->set_rules('last_name', 'Last name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password2', 'Confirm password', 'matches[password]');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('users/register', $data);
                $this->load->view('templates/footer');
            } else {
                //encrypt the password
                $enc_password = md5($this->input->post('password'));

                $this->user_model->register($enc_password);

                //Set message
                $this->session->set_flashdata('user_registered', 'You are now registered and can log in');

                redirect('categories');
            }
        }

        public function login(){
            $data['title'] = 'Sign In';

            $this->form_validation->set_rules('username', 'Name', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('users/login', $data);
                $this->load->view('templates/footer');
            } else {
                //Get username
                $username = $this->input->post('username');
                //Get and encrypt the password
                $password = md5($this->input->post('password'));

                //Login user
                $user_id = $this->user_model->login($username, $password);

                if($user_id){
                    //create session
                    $user_data = array(){
                        'user_id' => $user_id,
                        'username' => $username,
                        'logged_in' => TRUE
                    };

                    $this->session->set_userdata($user_data);
                    //Set message
                    $this->session->set_flashdata('user_login', 'You are now logged in');
                    redirect('categories');
                } else {
                    //Set error message
                    $this->session->set_flashdata('login_failed', 'Login is invalid');
                    redirect('users/login');
                }
            }
        }

        //Check if username exists
        function check_username_exists($username){
            $this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');

            if($this->user_model->check_username_exists($username)){
                return true;
            }else {
                return false;
            }
        }

        //Check if email exists
        function check_email_exists($email){
            $this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');

            if($this->user_model->check_email_exists($email)){
                return true;
            }else {
                return false;
            }
        }

        
    }