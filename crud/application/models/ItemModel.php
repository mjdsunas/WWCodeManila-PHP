<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ItemModel extends CI_Model {
    public function getItems($offset, $noofitems){
        $q = $this->db->limit($noofitems, $offset)
            ->get('tblitem'); 
        return $q->result();    
    }
    public function getAllItems(){
        $q = $this->db->get('tblitem'); 
        return $q->result();    
    }
    
    public function getItem($id){
        $q = $this->db->where('id',$id)
            ->get('tblitem');
        
        return $q->row();
    }

    public function destroy($id){
        $this->db->where('id',$id)
            ->delete('tblitem');
    } 

    public function insert($data){
        $this->db->insert('tblitem',$data);

    }

    public function update($id,$data){
        $this->db->where('id',$id)
            ->update('tblitem',$data);

    }

    public function countRecords(){
        return $this->db->count_all('tblitem');
    }
}
