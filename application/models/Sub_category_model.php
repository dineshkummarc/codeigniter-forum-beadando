<?php
class Sub_category_model extends CI_Model{
    public function __construct(){
        //load the db library
        $this->load->database();
    }

    public function get_sub_categories($id = FALSE){
        if($id == FALSE){
            $this->db->order_by('name', 'ASC');
            $query = $this->db->get('sub_categories');
            return $query->result_array();
        }

        $query = $this->db->get_where('sub_categories', array('id' => $id));
        return $query->row_array();
    }

    //FIXME: throw error
    public function get_sub_categories_by_parent_category_id($id = FALSE){
        if($id == FALSE){
            $this->db->order_by('name', 'ASC');
            $query = $this->db->get('sub_categories');
            return $query->result_array();
        }

        $query = $this->db->get_where('sub_categories', array('maincategory_id' => $id));
        return $query->row_array();
    }

    //TODO: csak belépett felhasználó
    public function create_sub_category($maincategory_id){
        //get the form values
        $data = array(
            'name' => $this->input->post('name'),
            'maincategory_id' => $maincategory_id
        );

        return $this->db->insert('sub_categories', $data);
    }

    public function delete_sub_category($id){
        $this->db->where('id', $id);
        $this->db->delete('sub_categories');
        return TRUE;
    }

    //TODO: csak admin vagy aki létrehozta módosíthatja
    public function update_sub_category(){
        $data = array(
            //TODO: add user_id, category_id ...
            'name' => $this->input->post('name')
        );

        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('sub_categories', $data);
    }
}