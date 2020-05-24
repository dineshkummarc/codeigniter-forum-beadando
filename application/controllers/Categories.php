<?php
    class Categories extends CI_Controller{
        public function index(){
            $data['title'] = 'Categories <a class="btn btn-outline-success float-right" 
            href="'.site_url('/categories/create').'">Create Category</a>';
            
            $data['categories'] = $this->main_category_model->get_main_categories();

            $this->load->view('templates/header');
            $this->load->view('categories/index', $data);
            $this->load->view('templates/footer');
        }

        public function view($id = NULL){
            // TODO: list sub categories
            $data['main_category'] = $this->main_category_model->get_main_categories($id);
            
            if(empty($data['main_category'])){
                show_404();
            }

            $data['name'] = $data['main_category']['name'];

            $this->load->view('templates/header');
            $this->load->view('categories/view', $data);
            $this->load->view('templates/footer');
        }

        //TODO: csak admin
        public function create(){
            $data['title'] = 'Create Category';

            //Validation rules
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('categories/create', $data);
                $this->load->view('templates/footer');
            } else {
                $this->main_category_model->create_main_category();
                redirect('categories');
            }
        }

        //TODO: csak akkor lehessen törölni ha admin vagy, vagy ha tiéd a poszt
        public function delete($id){
            $this->main_category_model->delete_main_category($id);
            redirect('categories');
        }

        //TODO: csak akkor lehessen módosítani ha admin vagy, vagy ha tiéd a poszt
        public function edit($id){
            $data['categories'] = $this->main_category_model->get_main_categories($id);
            
            if(empty($data['categories'])){
                show_404();
            }

            $data['title'] = 'Edit Category';

            $this->load->view('templates/header');
            $this->load->view('categories/edit', $data);
            $this->load->view('templates/footer');
        }

        //TODO: csak akkor lehessen módosítani ha admin vagy, vagy ha tiéd a poszt
        public function update(){
            $this->main_category_model->update_main_category();
            redirect('categories');
        }
    }