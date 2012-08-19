<?php

function account()
 {
  $fb_data = $this->session->userdata('fb_data');

  if((!$fb_data['uid']) or (!$fb_data['me']))
  {

   redirect('home  xis');
  }
  else if($this->Facebook_model->id_check($fb_data['me']['id']) < 0 )
  {
   $query = array(
    'id' => $fb_data['me']['id'],
    'fullname' => $fb_data['me']['name'],
    'photo' => $fb_data['uid']['profile-pic'],
    'place' =>$fb_data['id']['location']
       
   );

   $this->db->insert('users',$query); 
   
  }
  else
  {
  
   $data = array(
      'fb_data' => $fb_data

    );
  }

 } 
?>
