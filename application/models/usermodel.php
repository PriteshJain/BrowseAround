<?php
class UserModel extends CI_Model()
{
    public function id_check($id) {
    $this->db->where('id', $id);
    return $this->db->get('users')->num_rows();
}
}
?>
