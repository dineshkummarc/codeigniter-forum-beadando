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

             //TODO: akkor az összes ehhez tartozó kommentet is ki kell törölni hékás!

            redirect('categories');
        }

        //TODO: csak akkor lehessen módosítani ha admin vagy, vagy ha tiéd a poszt
        public function edit($id){
            $data['subcategories'] = $this->sub_category_model->get_sub_categories($id);
            
            if(empty($data['subcategories'])){
                show_404();
            }

            $data['title'] = 'Edit Sub-Category';

            $this->load->view('templates/header');
            $this->load->view('subcategories/edit', $data);
            $this->load->view('templates/footer');
        }

        //TODO: csak akkor lehessen módosítani ha admin vagy, vagy ha tiéd a poszt
        public function update(){
            $this->sub_category_model->update_sub_category();
            redirect('categories');
        }
    }