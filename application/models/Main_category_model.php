<?php
class Main_category_model extends CI_Model{
    public function __construct(){
        //load the db library
        $this->load->database();
    }

    public function get_main_categories($id = FALSE){
        if($id == FALSE){
            $this->db->order_by('name', 'ASC');
            $query = $this->db->get('categories');
            return $query->result_array();
        }

        $query = $this->db->get_where('categories', array('id' => $id));
        return $query->row_array();
    }

    public function get_ordered_categories($order_by){
        $this->db->order_by($order_by, 'ASC');
        $query = $this->db->get('categories');
        return $query->result_array();
    }

    public function create_main_category($post_image){
        //get the form values
        $data = array(
            'user_id' => $this->session->userdata('user_id'),
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'photo' => $post_image
        );

        $this->db->insert('categories', $data);
    }

    public function delete_main_category($id){
        $this->db->where('id', $id);
        $this->db->delete('categories');
        return TRUE;
    }

    public function update_main_category(){
        $data = array(
            // ha kéne hogy utoljára ki módosította
            //'user_id' => $this->session->userdata('user_id');
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description')
        );

        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('categories', $data);
    }
}