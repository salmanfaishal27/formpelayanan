<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_login extends CI_Model {

  function cek($username, $password) {
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        return $this->db->get("admin");
    }

}
