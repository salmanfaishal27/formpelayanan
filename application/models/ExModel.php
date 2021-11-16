<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ExModel extends CI_Model {

  public function viewhistory(){
    return $this->db->get('history')->result();
  }

}