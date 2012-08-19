<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

    public function __construct($rules = array()) {
        parent::__construct($rules);
        $this->CI = & get_instance();
    }

    /**
     * unique() Method
     *
     * @url     http://uniquemethod.com/
     * @author  Unique Method
     */
    public function unique($str, $field) {
        $this->CI->form_validation->set_message('unique', 'That %s is already in use.');
        list($table, $column) = explode('.', $field, 2);
        $query = $this->CI->db->query("SELECT NULL FROM $table WHERE $column = '$str'");

        return ($query->row()) ? FALSE : TRUE;
    }

}

// END MY_Form_validation Class
 
/* End of file MY_Form_validation.php */
/* Location: ./application/libraries/MY_Form_validation.php */