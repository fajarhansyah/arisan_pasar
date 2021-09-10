<?php
class Model_crud extends CI_Model{
  public function tambah_data($data,$tables){
      $this->db->insert($tables,$data);
  }
  public function edit_data($where,$tables){
    return $this->db->get_where($tables,$where);
  }
  public function update_data($where,$data,$tables){
      $this->db->where($where);
      $this->db->update($tables,$data);
  }
  public function hapus_data($where,$tables){
    $this->db->where($where);
    $this->db->delete($tables);
  }
}
 ?>