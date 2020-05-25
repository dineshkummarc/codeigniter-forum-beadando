<?php
    class Posts extends CI_Controller{
        public function index(){
            $data['title'] = 'Latest Posts';
            
            $data['posts'] = $this->post_model->get_posts();
            
            //Number of words shown / post in the pages/index view
            $number_of_words = 60;
            $data['number_of_words'] = $number_of_words;

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
            $data['title'] = '<strong>Topic</strong></br>'.$data['subcategory']['name'].'<a class="btn btn-outline-success float-right" 
            href="'.site_url('/posts/create').'">Answer</a>';

            $this->load->view('templates/header');
            $this->load->view('posts/topic', $data);
            $this->load->view('templates/footer');
        }

        //TODO: csak akkor lehessen posztot készíteni ha be van jelentkezve
        public function create(){
            $data['title'] = 'Create Post';

            //Validation rules
            $this->form_validation->set_rules('body', 'Body', 'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('posts/create', $data);
                $this->load->view('templates/footer');
            } else {
                //this is submitted
                $this->post_model->create_post();
                redirect(base_url('posts'));
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