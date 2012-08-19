<?php

class Social extends CI_Controller {

    public $appid;
    public $apisecret;

    public function __construct() {
        parent::__construct();
        // replace these with Application ID and Application Secret.
        $this->appid = '260435324073672';
        $this->apisecret = 'e1779e0eadfc4a2ac3a49c37d5e58512';
    }

    public function index() {
        // page user sees after logging out/incorrect credentials
        $callback = site_url('facebook/confirm');
        $url = "https://graph.facebook.com/oauth/authorize?client_id={$this->appid}&redirect_uri={$callback}&scope=name,profile-pic,location";
        redirect($url);
    }

    /**     * Token exchange     */
    public function confirm() {
        $redirect = site_url('facebook/confirm');
        $code = $this->input->get('code');
        if ($code) {
            // now to get the auth token. '__getpage' is just a CURL method
            $gettoken = "https://graph.facebook.com/oauth/access_token?client_id={$this->appid}&redirect_uri={$redirect}&client_secret={$this->apisecret}&code={$code}";
            $return = $this->__getpage($gettoken);
            // if CURL didn't return a valid 200 http code, die
            if (!$return)
                die('Error getting token');
            // put the token into the $access_token variable
            parse_str($return);
            // now you can save the token to a database, and use it to access the user's graph
            // for example, this will return all their basic info.  check the FB Dev docs for more.
            $infourl = "https://graph.facebook.com/me?access_token=$access_token";
            $return = $this->__getpage($infourl);
            if (!$return)
                die('Error getting info');
            $info = json_decode($return);
            print_r($info);
        }
    }

    /**
     * CURLing to interface with FB API
     * @param string $url
     * @return json 
     */
    private function __getpage($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $return = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        // check if it returns 200, or else return false
        if ($http_code === 200) {
            curl_close($ch);
            return $return;
        } else {
            // store the error. I may want to return this instead of FALSE later
            $error = curl_error($ch);
            curl_close($ch);
            return FALSE;
        }
    }

    function insert() {
        $fb_data = $this->session->userdata('fb_data');

        if ((!$fb_data['uid']) or (!$fb_data['me'])) {
            redirect('home');
        } else {
            if ($this->shout_model->idFetch->id_check($fb_data['me']['id']) < 0) {
                $query = array(
                    'id' => $fb_data['me']['id'],
                    'fullname' => $fb_data['me']['name'],
                    'photo' => $fb_data['uid']['profile-pic'],
                    'place' => $fb_data['id']['location']
                );

                $this->db->insert('users', $query);
            }
        }
    }

}