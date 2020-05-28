<?php
    class Admin extends CI_Controller {
        public function index(){
            $this->check_login_as_admin();

            $data['title'] = 'Admin Page';
            
            $data['users'] = $this->user_model->get_users();
            $data['categories'] = $this->main_category_model->get_ordered_categories('id');
            $data['subcategories'] = $this->sub_category_model->get_sub_categories();
            $data['posts'] = $this->post_model->get_posts();

            $this->load->view('templates/header');
            $this->load->view('admin/index', $data);
            $this->load->view('templates/footer');
        }
        
        public function check_login_as_admin(){
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            if($this->session->userdata('user_id') != ADMIN_ID){
                $this->session->set_flashdata('permission_denied', 'Permission denied!');
                redirect(base_url('home'));
            }
        }

        public function export_posts(){
            $file_name = 'users_details_on_'.date('Ymd').'.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$file_name");
            header("Content-Type: application/csv;");
            $posts_data = $this->post_model->get_posts();
            
            //TODO: később megcsinálni úgy, hogy a likeok és dislikeok száma is benne legyen
            $file  = fopen('php://output', 'w');
            $header = array("id", "user_id", "subcategory_id", "parent_post_id", "body", "created_at");
            fputcsv($file, $header);
            foreach($posts_data as $row => $innerArray){
                foreach($innerArray as $innerRow => $value){
                    fputcsv($file, $value);
                }
            }
            fclose($file);
            exit;
        }
    }