<?php
    class Categories extends CI_Controller{
        public function index(){
            $data['title'] = 'Categories';
            
            $data['categories'] = $this->main_category_model->get_main_categories();

            $this->load->view('templates/header');
            $this->load->view('categories/index', $data);
            $this->load->view('templates/footer');
        }

        public function view($id = NULL){
            $data['main_category'] = $this->main_category_model->get_main_categories($id);
            $data['sub_category'] = $this->sub_category_model->get_subcategories_of_maincategory($id);
            
            if(empty($data['main_category'])){
                show_404();
            }

            $data['title'] = $data['main_category']['name'];

            $this->load->view('templates/header');
            $this->load->view('categories/view', $data);
            $this->load->view('templates/footer');
        }

        public function create(){
            //Check login
            $this->check_login();
            if($this->session->userdata('user_id') != ADMIN_ID){
                $this->session->set_flashdata('permission_denied', 'Permission denied!');
                redirect(base_url('home'));
            }

            $data['title'] = 'Create Category';

            //Validation rules
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('categories/create', $data);
                $this->load->view('templates/footer');
            } else {
                //Upload image
                $config['upload_path'] = './assets/images/categories/';
                $config['allowed_types'] = 'jpg|jpeg|gif|png';
                $config['max_size'] = 2048;
                $config['max_width'] = 1024;
                $config['max_height'] = 1024;
                $config['overwrite'] = FALSE;
                $config['file_ext_tolower'] = TRUE;
                
                $this->load->library('upload', $config);

                //Ha valami baj van a feltöltéssel
                if(!$this->upload->do_upload('categoryimage')){
                    $data['errors'] = $this->upload->display_errors();
                    $this->load->view('templates/header');
                    $this->load->view('categories/create', $data);
                    $this->load->view('templates/footer');
                }

                $data = array('upload_data' => $this->upload->data());
                if(empty($_FILES['categoryimage']['name'])){
                    $post_image = 'noimage.jpg';
                } else {
                    $post_image = $_FILES['categoryimage']['name'];
                }
                $this->main_category_model->create_main_category($post_image);
                //TODO: redirect to the new categories view page

                //set message
                $this->session->set_flashdata('category_created', 'Your category has been created!');

                redirect('categories');
            }
        }

        //Sub Category létrehozása egy Main Category view nézetében
        public function create_subcategory($maincategory_id){
            //Check login
            $this->check_login();

            if($this->input->post('submit')){
                // a validáció sikeres
                $this->sub_category_model->create_sub_category($maincategory_id, $this->input->post('name'));

                //set message
                $this->session->set_flashdata('subcategory_created', 'Your topic has been created!');

                redirect('categories/'.$maincategory_id);
            }
        }

        public function delete($id){
            //Check login
            $this->check_login();

            //Check Admin
            if($this->session->userdata('user_id') != ADMIN_ID){
                $this->session->set_flashdata('permission_denied', 'Permission denied!');
                redirect(base_url('categories'));
            }
            //FIXME:
            //Get the image location
            $record = $this->main_category_model->get_main_categories($id);
            $image_name = $record['photo'];
            //Delete image if not noimage.jpg
            if($image_name != 'noimage.jpg'){
                $this->load->helper("file");
                delete_files(base_url('assets/images/categories/'.$image_name));
            }
            $this->main_category_model->delete_main_category($id);

            //set message
            $this->session->set_flashdata('category_deleted', 'Your category has been deleted!');

            redirect('categories');
        }

        public function edit($id){
            $this->check_login();
            //csak akkor lehessen módosítani ha admin vagy
            if($this->session->userdata('user_id') != ADMIN_ID){
                $this->session->set_flashdata('permission_denied', 'Permission denied!');

                redirect(base_url('home'));
            }

            $data['categories'] = $this->main_category_model->get_main_categories($id);
            
            if(empty($data['categories'])){
                show_404();
            }

            $data['title'] = 'Edit Category';

            //set message
            $this->session->set_flashdata('category_edited', 'Your category has been updated!');

            $this->load->view('templates/header');
            $this->load->view('categories/edit', $data);
            $this->load->view('templates/footer');
        }

        public function update(){
            $this->check_login();
            //csak akkor lehessen módosítani ha admin vagy
            if($this->session->userdata('user_id') != ADMIN_ID){
                $this->session->set_flashdata('permission_denied', 'Permission denied!');
                redirect(base_url('home'));
            }
            
            $this->main_category_model->update_main_category();
            
            redirect('categories');
        }

        public function check_login(){
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
        }
    }