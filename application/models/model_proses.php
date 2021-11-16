<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_proses extends CI_Model {

	public function insert_permintaan($data){
		$this->db->insert('permintaan',$data);
	}
	public function insert_regist($data){
		$this->db->insert('user',$data);
	}
	// 	public function insert_history($data){
	// 	$this->db->insert('history',$data);
	// }
	public function insert_history($data2){
		$this->db->insert('history',$data2);
	}

	public function update_history($id_permintaan,$data){
		$this->db->where('id_permintaan',$id_permintaan);
		$this->db->update('history',$data);
	}

	public function update_profile($data){
		$this->db->where('id_user',$data['id_user']);
		$this->db->update('user',$data);
	}

}
