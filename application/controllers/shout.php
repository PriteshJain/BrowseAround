<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Shout extends CI_Controller {

    function Shout() {
        parent::__construct();
    }

    function index() {
        $data['title'] = 'BrowseAround | Home';
        $this->load->view('index', $data);
    }

    function saveShout() {
        $result = array();
        $data = array();
        $data['loc'] = array(
            'lat' => (float) $this->input->post('latitude'),
            'long' => (float) $this->input->post('longitude')
        );
        $data['shout'] = $this->input->post('shout');
        $data['shoutedAt'] = new MongoDate(strtotime(date("F j, Y, g:i a")));
        $data['replyFor'] = $this->input->post('replyFor');
        $data['replyFrom'] = $this->input->post('replyFrom');

        $shoutData = $this->shout_model->saveShout($data);

        if (count($shoutData)) {
            $result = $this->load->view('singleShout', $shoutData[count($shoutData) - 1]);
        } else {
            $result = 'error while inserting';
        }
        echo $result;
    }

    function getShouts() {
        $location = array((float) $this->input->post('latitude'),
            (float) $this->input->post('longitude'));
        $this->session->set_userdata('cords', $location);
        $data['shoutData'] = $this->shout_model->getNearbyShouts($location);
        $this->load->view('shouts', $data);
    }

}

?>
