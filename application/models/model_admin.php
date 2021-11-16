<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_admin extends CI_Model {

	public function tampilkan_data_permintaan(){
		$hasil = $this->db->get('permintaan');
		return $hasil->result();
	}

	public function update_approve($data){
		$this->db->where('id_permintaan',$data['id_permintaan']);
		$this->db->update('permintaan',$data);
	}

	public function update_stat($data2){
		$this->db->where('id_permintaan',$data2['id_permintaan']);
		$this->db->update('permintaan',$data2);
	}

	public function update_pending($id_permintaan,$data){
		$this->db->where('id_permintaan',$id_permintaan);
		$this->db->update('permintaan',$data);
	}

	public function update_history($id_permintaan,$data){
		$this->db->where('id_permintaan',$id_permintaan);
		$this->db->update('history',$data);
	}

	public function hapus_data_permintaan($id_permintaan){
		$this->db->where('id_permintaan',$id_permintaan);
		$this->db->delete('permintaan');
	}
	public function tampilkan_data_history(){
		$hasil = $this->db->get('history');
		return $hasil->result();
	}

	public function tampilkan_data_history_keyword($keyword){
		$this->db->select('*');
		$this->db->from('history');
		$this->db->like('nama',$keyword);
		$this->db->or_like('permasalahan',$keyword);
		return $this->db->get()->result();
	}	

	public function ambil_data($table){
		return $this->db->get($table);
	}

}
