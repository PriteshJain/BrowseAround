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

      function addUser($user) {
        $query = $this->mongo_db->insert('users',$user);
        return $this->getUserviaId($query);
    }

    function getUserviaId($id) {
        return $this->mongo_db->where('_id', $id)->get('users');
    }

     function getUser($id) {
        return $this->mongo_db->where('userId', $id)->get('users');        
       

    }
    function findOrSaveUser($data) {
    	$query = $this->getUser($data['userId']);
    	 if( $query != NULL && count($query) > 0){
        	return $query;
        }
        else
        {
        	return $this->addUser($data);
        }
    }

}

?>
