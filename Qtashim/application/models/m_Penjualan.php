<?php

class m_Penjualan extends CI_Model{
    
    public function tampil_Data()
    {
        return $this->db->get('daftar_barang')->result_array();
    }
  
    public function input_data($data){
        $this->db->insert('daftar_barang',$data);
    }

    function del($id){
		$this->db->delete('daftar_barang',['id' => $id]);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	
}


?>