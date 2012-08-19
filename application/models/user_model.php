<?php

/**
 * User_model
 *
 * @package browseAround
 */
class User_model extends CI_Model {
    
    function idCheck ($id) {
        return $this->db->where('id', $id)->get('users');        
    }
}

?>
