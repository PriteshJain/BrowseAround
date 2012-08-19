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

        $data = array();
        $data['loc'] = array(
            'lat' => (float) $this->input->post('latitude'),
            'long' => (float) $this->input->post('longitude')
        );

        $location = array((float) $this->input->post('latitude'),
            (int) $this->input->post('longitude'));
        $data['shout'] = $this->input->post('shout');
        $shoutData = $this->shout_model->saveShout($data);

        $result = array();
        if (count($shoutData)) {
            $result = $this->load->view('singleShout', $shoutData[count($shoutData) - 1]);
        } else {
            // $result = FALSE;
            $result = 'error while inserting';
        }
        echo $result;
    }

    function getShouts() {
        $location = array((float) $this->input->post('latitude'),
            (int) $this->input->post('longitude'));
        $data['shout'] = $this->input->post('shout');
        $shoutData = $this->shout_model->saveShout($data);

        var_dump($this->shout_model->getNearbyShouts($location));
    }

}

?>
