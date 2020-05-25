<?php
class Sub_category_model extends CI_Model{
    public function __construct(){
        //load the db library
        $this->load->database();
    }

    public function get_subcategories_of_maincategory($main_category_id){
        $this->db->select("*");
        $this->db->from('subcategories');
        $this->db->where('maincategory_id', $main_category_id);
        $query = $this->db->get()->result_array();// lekérdezési objektum
        return $query;
    }

    public function get_sub_categories($id){
        //Ha $id üres add vissza mindet
        if(empty($id)){
            $this->db->order_by('name', 'ASC');
            $query = $this->db->get('subcategories');
            return $query->result_array();
        }
        //Különben add vissza azt, aminek az id-je = $id
        $query = $this->db->get_where('subcategories', array('id' => $id));
        return $query->row_array();
    }

    //TODO: csak belépett felhasználó
    public function create_sub_category($maincategory_id, $name){
         $this->db->select("*");
         $this->db->from('subcategories');
         $this->db->where('maincategory_id', $maincategory_id);
         $this->db->where('name', $name); 
         //Ha már létezik az adatbázisban return null
         if(!empty($this->db->get()->row())){
            return NULL;
         }

        $data = array(
            'name' => $name,
            'maincategory_id' => $maincategory_id
        );
        
        return $this->db->insert('subcategories', $data);
    }

    public function delete_sub_category($id){
        $this->db->where('id', $id);
        $this->db->delete('subcategories');
        return TRUE;
    }

    //TODO: csak admin vagy aki létrehozta módosíthatja
    public function update_sub_category($id, $name){
            $record = [
                'name' => $name,
            ];
            $this->load->helper('html');
            // where-ben mondom meg a firssítés alapját (feltételét)
            $this->db->where('id', $id);
            return $this->db->update('subcategories', $record); 
    }
}