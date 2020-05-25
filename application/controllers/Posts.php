<?php
    class Posts extends CI_Controller{
        public function index(){
            $data['title'] = 'Latest Posts';
            $data['number_of_words'] = 60;
            $data['posts'] = $this->post_model->get_all_posts();

            $this->load->view('templates/header');
            $this->load->view('posts/index', $data);
            $this->load->view('templates/footer');
        }

        public function view($id = NULL){
            $data['post'] = $this->post_model->get_posts($id);
            
            if(empty($data['post'])){
                show_404();
            }

            //FIXME: 
            //$data['title'] = $data['post']['title'];

            $this->load->view('templates/header');
            $this->load->view('posts/view', $data);
            $this->load->view('templates/footer');
        }

        public function topic($subcategory_id){
            $data['posts'] = $this->post_model->get_posts_as_same_subcategory($subcategory_id);
            $data['subcategory'] = $this->sub_category_model->get_sub_categories($subcategory_id);
            $data['title'] = '<strong>Topic</strong></br>';

            $this->load->view('templates/header');
            $this->load->view('posts/topic', $data);
            $this->load->view('templates/footer');
        }

        //TODO: csak akkor lehessen posztot készíteni ha be van jelentkezve
        public function create($subcategory_id){
            $data['title'] = 'Create Post';

            //Validation rules
            $this->form_validation->set_rules('body', 'Body', 'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('posts/create', $data);
                $this->load->view('templates/footer');
            } else {
                //this is submitted

                //set message
                $this->session->set_flashdata('post_created', 'Your post has been created!');

                $this->post_model->create_post($subcategory_id);
                redirect(base_url('posts/topic/'.$subcategory_id));
            }
        }

        //TODO: csak akkor lehessen törölni ha admin vagy, vagy ha tiéd a poszt
        public function delete($id){
            $this->post_model->delete_post($id);
            $subcategory_id = $this->input->post('subcategory_id');

            //set message
            $this->session->set_flashdata('post_deleted', 'Your post has been deleted!');


            redirect(base_url('posts/topic/').$subcategory_id);
        }

        //TODO: csak akkor lehessen módosítani ha admin vagy, vagy ha tiéd a poszt
        public function edit($id){
            $data['post'] = $this->post_model->get_posts($id);
            
            if(empty($data['post'])){
                show_404();
            }

            $data['title'] = 'Edit Post';

            //set message
            $this->session->set_flashdata('post_updated', 'Your post has been updated!');

            $this->load->view('templates/header');
            $this->load->view('posts/edit', $data);
            $this->load->view('templates/footer');
        }

        //TODO: csak akkor lehessen módosítani ha admin vagy, vagy ha tiéd a poszt
        /*public function update(){
            $this->post_model->update_post();
            redirect('posts');
        }*/
    }