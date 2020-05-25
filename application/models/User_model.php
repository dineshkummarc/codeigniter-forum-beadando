<?php
    class User_model extends CI_Model{
        public function register($enc_password){
            // User data array
            $data = array(
                'username' => $this->input->post('username'),
                'first_name' => $this->input->post('firstname'),
                'last_name' => $this->input->post('lastname'),
                'email' => $this->input->post('email'),
                'password' => $enc_password

            );

            //insert user
            return $this->db->insert('users', $data);
        }

        // Check username exists
        public function check_username_exists($username){
            $query = $this->db->get_where('users', array('username' => $username));
            if(empty($query->row_array())){
                return true;
            } else {
                return false;
            }
        }

        // Check email exists
        public function check_email_exists($email){
            $query = $this->db->get_where('users', array('email' => $email));
            if(empty($query->row_array())){
                return true;
            } else {
                return false;
            }
        }

        
    }