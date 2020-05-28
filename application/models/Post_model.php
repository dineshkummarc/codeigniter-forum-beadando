<?php
class Post_model extends CI_Model{
    public function __construct(){
        //load the db library
        $this->load->database();
    }

    //Get posts for 
    public function get_posts($id = FALSE, $limit = FALSE, $offset = FALSE){
        if($limit) {
            $this->db->limit($limit, $offset);
        }
        
        if($id == FALSE){
            //TODO: utolsó bejegyzést felülre?
            $this->db->select('*');
            $this->db->from('posts');
            //JOIN
            //$this->db->join('table2', 'table1.id=table2.id')
            $this->db->join('subcategories', 'posts.subcategory_id = subcategories.id');
            $this->db->order_by('posts.created_at', 'DESC');
            $query = $this->db->get();
            return $query->result_array();
        }

        $query = $this->db->get_where('posts', array('id' => $id));
        return $query->row_array();
    }

    public function get_posts_from_same_subcategory($subcategory_id, $limit = FALSE, $offset = FALSE){
        if($limit) {
            $this->db->limit($limit, $offset);
        }
        
        $this->db->select("*");
        $this->db->from('posts');
        $this->db->where('subcategory_id', $subcategory_id);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function create_post($subcategory_id){
        //get the form values
        $data = array(
            //TODO: add parent_post_id
            'user_id' => $this->session->userdata('user_id'),
            'subcategory_id' => $subcategory_id,
            'body' => $this->input->post('body')
        );

        return $this->db->insert('posts', $data);
    }

    public function delete_post($id){
        $this->db->where('id', $id);
        $this->db->delete('posts');
        return TRUE;
    }

    public function delete_posts_by_subcategory_id($subcategory_id){
        $this->db->where('subcategory_id', $subcategory_id);
        $this->db->delete('posts');
        return TRUE;
    }

    public function update_post(){
        $data = array(
            'title' => $this->input->post('title'),
            'body' => $this->input->post('body')
        );

        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('posts', $data);
    }
}