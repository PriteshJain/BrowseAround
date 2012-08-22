<?php

class Auth extends CI_Controller {

	function __construct() {

		parent::__construct();

		$this->load->config('facebook');

		$facebook_config = array(
			'client_id' 	=> config_item('facebook_app_id'),
			'client_secret'	=> config_item('facebook_secret_key'),
			'callback_url'	=> base_url()."index.php/auth",
			'access_token'	=> NULL
			);

		$this->load->library('facebook_oauth', $facebook_config);

	}
	
	function index() {

		$data = array();
		
		if (isset($_GET['code'])) {

			$this->data['token'] = $this->facebook_oauth->getAccessToken($_GET['code']);
			$this->data['me'] = $this->facebook_oauth->get('/me');
			$this->session->set_userdata('user_id',$this->data['me']->id);

			$object = array(
				'userId'  => 	$this->data['me']->id,
				'username' => 		$this->data['me']->username,
				'username' => 		$this->data['me']->username,
				'name' => 		$this->data['me']->name
				);

			$this->load->model('user_model');


			
			if(!$this->session->userdata('logged_in')) 
			{
				
				
				$user = $this->user_model->findOrSaveUser($object);
				
				$this->session->set_userdata('current_user',$user);
				$this->session->set_userdata('logged_in',true);
				$this->session->set_userdata('userDbId',$user->id);


				
			}
			$data['title'] = 'BrowseAround | Home';
			$this->load->view('index', $data);

		} else {

			$scope = "publish_stream,offline_access,publish_stream";
			
			$this->data['auth_url'] = $this->facebook_oauth->getAuthorizeUrl($scope);
			
			$this->load->vars('data', $this->data);
			$this->load->view('login', $this->data);
			
		}

	}

	function destroySession() {
		$this->session->unset_userdata('current_user');
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('userDbId');
		$this->load->view('login', $data);

	}
}
?>	