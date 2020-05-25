<?php
class Sub_category_model extends CI_Model{
    public function __construct(){
        //load the db library
        $this->load->database();
    }

    public function get_sub_categories($id){
        if(empty($id)){
            $this->db->order_by('name', 'ASC');
            $query = $this->db->get('sub_categories');
            return $query->result_array();
        }

        $this->db->select("*");
        $this->db->from('sub_categories');
        $this->db->where('maincategory_id', $id);
        $query = $this->db->get()->result_array();// lekérdezési objektum
        return $query;
    }

    //TODO: csak belépett felhasználó
    public function create_sub_category($maincategory_id, $name){
        $data = array(
            'name' => $name,
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