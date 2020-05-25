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
            $data['main_category'] = $this->main_category_model->get_main_categories($id);
            // TODO: list sub categories
            $data['sub_categories'] = $this->sub_category_model->get_sub_categories_by_parent_category_id($id);
            
            if(empty($data['main_category'])){
                show_404();
            }

            //TODO: finish it
            $link = site_url('/subcategories/create/').$id;
            $data['title'] = $data['main_category']['name'].'<a class="btn btn-outline-success float-right" 
            href="'.$link.'">Create Sub-Category</a>';

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
                //Upload image
                $config['upload_path'] = './assets/images/categories/';
                $config['allowed_types'] = 'jpg|jpeg|gif|png';
                $config['max_size'] = 2048;
                $config['max_width'] = 1024;
                $config['max_height'] = 1024;
                $config['overwrite'] = FALSE;
                $config['file_ext_tolower'] = TRUE;
                
                $this->load->library('upload', $config);

                //Ha nem akar feltölteni képet
                if(empty($_FILES['categoryimage']['name'])){
                    $post_image = 'noimage.jpg';
                }
                //Ha valami baj van a feltöltéssel
                elseif(!$this->upload->do_upload('categoryimage')){
                    $data['errors'] = $this->upload->display_errors();
                    $this->load->view('templates/header');
                    $this->load->view('categories/create', $data);
                    $this->load->view('templates/footer');
                }
                //ha minden rendben
                else {
                    $data = array('upload_data' => $this->upload->data());
                    $post_image = $_FILES['categoryimage']['name'];
                    $this->main_category_model->create_main_category($post_image);
                    //TODO: redirect to the new categories view page
                    redirect('categories');
                }
            }
        }

        //TODO: csak akkor lehessen törölni ha admin vagy, vagy ha tiéd a poszt
        public function delete($id){
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
            //TODO: redirect to the edited categories view page
            redirect('categories');
        }
    }