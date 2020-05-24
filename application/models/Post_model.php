<?php
class Post_model extends CI_Model{
    public function __construct(){
        //load the db library
        $this->load->database();
    }

    public function get_posts($id = FALSE){
        if($id == FALSE){
            //TODO: utolsó bejegyzést felülre?
            $this->db->order_by('id', 'ASC');
            $query = $this->db->get('posts');
            return $query->result_array();
        }

        $query = $this->db->get_where('posts', array('id' => $id));
        return $query->row_array();
    }

    public function create_post(){
        //get the form values
        $data = array(
            //TODO: add user_id, category_id ...
            'title' => $this->input->post('title'),
            'body' => $this->input->post('body')
        );

        return $this->db->insert('posts', $data);
    }

    public function delete_post($id){
        $this->db->where('id', $id);
        $this->db->delete('posts');
        return TRUE;
    }

    public function update_post(){
        $data = array(
            //TODO: add user_id, category_id ...
            'title' => $this->input->post('title'),
            'body' => $this->input->post('body')
        );

        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('posts', $data);
    }
}