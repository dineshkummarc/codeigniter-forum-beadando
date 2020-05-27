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

        public function delete($id){
            //csak akkor lehessen törölni ha admin vagy, vagy ha tiéd az alkategóra
            if($this->session->userdata('user_id') != ADMIN_ID && 
                 $this->session->userdata('user_id') != $this->sub_category_model->get_sub_categories($id)['user_id']){

                $this->session->set_flashdata('permission_denied', 'Permission denied!');

                if($this->session->has_userdata('redirected_from')){
                    redirect($this->session->userdata('redirected_from'));
                } else {
                    redirect(base_url('home'));
                }
            }

            $this->sub_category_model->delete_sub_category($id);
            //Az összes ehhez tartozó posztot is kitörli
            $this->post_model->delete_posts_by_subcategory_id($id);

            //set message
            $this->session->set_flashdata('subcategory_deleted', 'Your topic has been deleted!');

            redirect('categories');
        }

        public function edit($id =NULL){
            if($id == NULL){
                show_error('A szerkesztéshez hiáynzik az id!');
            }

            $record = $this->sub_category_model->get_sub_categories($id);

            //csak akkor lehessen módosítani ha admin vagy, vagy ha tiéd a poszt
            if($this->session->userdata('user_id') != ADMIN_ID && 
                 $this->session->userdata('user_id') != $record['user_id']){

                $this->session->set_flashdata('permission_denied', 'Permission denied!');

                if($this->session->has_userdata('redirected_from')){
                    redirect($this->session->userdata('redirected_from'));
                } else {
                    redirect(base_url('home'));
                }
            }

            $this->load->library('form_validation');
            $this->form_validation->set_rules('name','Name','required');

            if($this->form_validation->run() == TRUE){
                $this->sub_category_model->update_sub_category( $id, $this->input->post('name'));
                //set message
                $this->session->set_flashdata('subcategory_updated', 'Your topic has been updated!');
                redirect(base_url('posts/topic/'.$id));
            } else {
                $view_params['subcategory'] = $record;
                $view_params['title'] = 'Edit Sub-Category';

                $this->load->view('templates/header');
                $this->load->view('subcategories/edit', $view_params);
                $this->load->view('templates/footer');
            }
        }
    }