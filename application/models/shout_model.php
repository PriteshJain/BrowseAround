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
        $query = $this->mongo_db->where_near('loc', $location, 500)->order_by(array('shoutedAt' => 'DESC'))->get('shouts');
        return $query;
    }

    function shoutreplies($id) {
        $query = $this->mongo_db->where(array('replyFor' => $id))->get('shouts');
        return $query;
    }

    function idFetch($id) {
        $query = $this->db->where('id', $id);
        return $this->db->get('users')->num_rows();
    }

    function destroyShout($id){
         // $query = $this->db->delete(array('_id' => $id));
    }

}
?>
