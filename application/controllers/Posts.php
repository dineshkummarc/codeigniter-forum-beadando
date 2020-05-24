<?php
    class Posts extends CI_Controller{
        public function index(){
            $data['title'] = 'Latest Posts';
            
            $data['posts'] = $this->post_model->get_posts();
            
            $this->load->view('templates/header');
            $this->load->view('posts/index', $data);
            $this->load->view('templates/footer');
        }

        public function view($id = NULL){
            $data['post'] = $this->post_model->get_posts($id);
            
            if(empty($data['post'])){
                show_404();
            }

            $data['title'] = $data['post']['title'];

            $this->load->view('templates/header');
            $this->load->view('posts/view', $data);
            $this->load->view('templates/footer');
        }

        //TODO: csak akkor lehessen posztot készíteni ha be van jelentkezve
        public function create(){
            $data['title'] = 'Create Post';

            //Validation rules
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('body', 'Body', 'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('posts/create', $data);
                $this->load->view('templates/footer');
            } else {
                $this->post_model->create_post();
                redirect('posts');
            }
        }

        //TODO: csak akkor lehessen törölni ha admin vagy, vagy ha tiéd a poszt
        public function delete($id){
            $this->post_model->delete_post($id);
            redirect('posts');
        }

        //TODO: csak akkor lehessen módosítani ha admin vagy, vagy ha tiéd a poszt
        public function edit($id){
            $data['post'] = $this->post_model->get_posts($id);
            
            if(empty($data['post'])){
                show_404();
            }

            $data['title'] = 'Edit Post';

            $this->load->view('templates/header');
            $this->load->view('posts/edit', $data);
            $this->load->view('templates/footer');
        }

        //TODO: csak akkor lehessen módosítani ha admin vagy, vagy ha tiéd a poszt
        public function update(){
            $this->post_model->update_post();
            redirect('posts');
        }
    }