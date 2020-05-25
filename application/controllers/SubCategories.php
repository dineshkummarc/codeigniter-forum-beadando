<?php
    class SubCategories extends CI_Controller{
        public function view($id = NULL){
            $data['sub_category'] = $this->sub_category_model->get_sub_categories($id);
            
            if(empty($data['sub_category'])){
                show_404();
            }

            $data['title'] = $data['sub_category']['name'];

            $this->load->view('templates/header');
            $this->load->view('subcategories/view', $data);
            $this->load->view('templates/footer');
        }

        //TODO: csak akkor lehessen törölni ha admin vagy, vagy ha tiéd az alkategóra
        public function delete($id){
            $this->sub_category_model->delete_sub_category($id);
            //Az összes ehhez tartozó posztot is kitörli
            $this->post_model->delete_posts_by_subcategory_id($id);

            redirect('categories');
        }

        //TODO: csak akkor lehessen módosítani ha admin vagy, vagy ha tiéd a poszt
        public function edit($id =NULL){
            if($id == NULL){
                show_error('A szerkesztéshez hiáynzik az id!');
            }

            $record = $this->sub_category_model->get_sub_categories($id);

            //$data['subcategories'] = $this->sub_category_model->get_sub_categories($id);

            $this->load->library('form_validation');
            $this->form_validation->set_rules('name','Name','required');

            if($this->form_validation->run() == TRUE){
                $this->sub_category_model->update_sub_category( $id, $this->input->post('name'));
                redirect(base_url('posts/topic/'.$id));
            } else {
                $view_params['subcategory'] = $record;
                $view_params['title'] = 'Edit Sub-Category';

                $this->load->view('templates/header');
                $this->load->view('subcategories/edit', $view_params);
                $this->load->view('templates/footer');
            }
        }

        //TODO: csak akkor lehessen módosítani ha admin vagy, vagy ha tiéd a poszt
        /*public function update(){
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->sub_category_model->update_sub_category();
            redirect(base_url());
        }*/
    }