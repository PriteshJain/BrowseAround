<?php

/**
 * Shout_model
 *
 * @package browseAround
 */
class Shout_model extends CI_Model {

    function saveShout($data) {
        $val = $this->mongo_db->insert('shouts', $data);
        return $this->getShoutviaID($val);
    }

    function getShoutviaID($id) {
        $query = $this->mongo_db->where('_id', $id)->get('shouts');
        return $query;
    }
    
    function getNearbyShouts($location) {
        $query = $this->mongo_db->where_near('loc', $location , 500 )->get('shouts');
        return $query;
    }

}