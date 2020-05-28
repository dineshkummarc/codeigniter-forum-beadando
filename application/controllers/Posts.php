<?php
    class Posts extends CI_Controller{
        public function index($offset = 0){
            // Pagination Config
            $config['base_url'] = base_url().'posts/index/';
            $config['total_rows'] = $this->db->count_all('posts');
            $config['per_page'] = 10;
            //localhost/appfolder/segment1/segment2/segment3
            $config['uri_segment'] = 3;
            $config['attributes'] = array('class' => 'pagination-link');

            // Init Pagination
            $this->pagination->initialize($config);

            $data['title'] = 'Latest Posts';
            $data['number_of_words'] = 60;
            $data['posts'] = $this->post_model->get_posts(FALSE, $config['per_page'], $offset);

            $this->load->view('templates/header');
            $this->load->view('posts/index', $data);
            $this->load->view('templates/footer');
        }

        public function view($id = NULL){
            $data['post'] = $this->post_model->get_posts($id);
            
            if(empty($data['post'])){
                show_404();
            }

            $this->load->view('templates/header');
            $this->load->view('posts/view', $data);
            $this->load->view('templates/footer');
        }

        public function topic($subcategory_id, $offset = 0){
            // Pagination Config
            $config['base_url'] = base_url().'posts/topic/'.$subcategory_id.'/';
            $config['per_page'] = 5;
            $config['total_rows'] = count($this->post_model->get_posts_from_same_subcategory($subcategory_id));
            $config['uri_segment'] = 4;
            $config['attributes'] = array('class' => 'pagination-link');
            // Init Pagination
            $this->pagination->initialize($config);

            $data['posts'] = $this->post_model->get_posts_from_same_subcategory($subcategory_id, $config['per_page'], $offset);
            $data['subcategory'] = $this->sub_category_model->get_sub_categories($subcategory_id);
            $data['title'] = '<strong>Topic</strong></br>';

            $this->load->view('templates/header');
            $this->load->view('posts/topic', $data);
            $this->load->view('templates/footer');
        }

        public function create($subcategory_id){
            $this->check_login();
            //csak akkor lehessen létrehozni ha admin vagy

            //Validation rules
            $this->form_validation->set_rules('body', 'Body', 'required');
            $data['title'] = 'Create Post';
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

        public function delete($id){
            $this->check_login();
            
            $record = $this->post_model->get_posts($id);
            $user_id = $this->session->userdata('user_id');
            
            //csak akkor lehessen törölni ha admin vagy, vagy ha tiéd a poszt
            if($this->session->userdata('user_id') != ADMIN_ID && 
               $this->session->userdata('user_id') != $record['user_id']){

                $this->session->set_flashdata('permission_denied', 'Permission denied!');

                if($this->session->has_userdata('redirected_from')){
                    redirect($this->session->userdata('redirected_from'));
                } else {
                    redirect(base_url('home'));
                }
            }

            

            $this->post_model->delete_post($id);
            $subcategory_id = $this->input->post('subcategory_id');

            //set message
            $this->session->set_flashdata('post_deleted', 'Your post has been deleted!');


            redirect(base_url('posts/topic/').$subcategory_id);
        }

        public function edit($id){
            $this->check_login();

            $data['post'] = $this->post_model->get_posts($id);
            //csak akkor lehessen módosítani ha admin vagy, vagy ha tiéd a poszt
            if($this->session->userdata('user_id') != ADMIN_ID && $this->session->userdata('user_id') != $data['post']['user_id']){

                $this->session->set_flashdata('permission_denied', 'Permission denied!');

                if($this->session->has_userdata('redirected_from')){
                    redirect($this->session->userdata('redirected_from'));
                } else {
                    redirect(base_url('home'));
                }
            }

            
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

        public function update(){
            $this->check_login();
            //csak akkor lehessen módosítani ha admin vagy, vagy ha tiéd a poszt
            if($this->session->userdata('user_id') != ADMIN_ID && $this->session->userdata('user_id') != $data['post']['user_id']){

                $this->session->set_flashdata('permission_denied', 'Permission denied!');

                if($this->session->has_userdata('redirected_from')){
                    redirect($this->session->userdata('redirected_from'));
                } else {
                    redirect(base_url('home'));
                }
            }

            $this->post_model->update_post();
            redirect('posts');
        }

        public function check_login(){
            //if not logged in redirect to login page
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
        }
    }
