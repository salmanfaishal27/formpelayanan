<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent ::__construct();
		if (!$this->session->userdata('email')){
			redirect('auth');
		}
	}
	
	public function index()
	{
		$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();		
		$this->load->view('home',$data);
	}

	public function form()
	{
		$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();		
		$this->load->view('form',$data);
	}
	public function tanggapan()
	{
		$this->load->model('model_admin');	
		$datapermintaan['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
	
		$datapermintaan['datapermintaan'] = $this->model_admin->tampilkan_data_permintaan();
		$this->load->view('riwayat',$datapermintaan);
	}

	public function tunggu(){
		$this->load->view('tunggu');
	}
	public function proses(){
		date_default_timezone_set('Asia/Jakarta');
		$data['nama'] = $this->input->post('nama');
		$data['id_user'] = $this->input->post('id_user');
		$data['bagian'] = $this->input->post('bagian');
		$data['permasalahan'] = $this->input->post('permasalahan');
		$data['tanggal_permintaan'] = date("Y-m-d");
		$data['jam_permintaan'] = date("H:i:s");
		$data['status'] = 'Pending';
		$this->load->model('model_proses');
		$this->model_proses->insert_permintaan($data);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Pesan berhasil dikirim, silahkan tunggu. </div>');
		redirect('home/form');
	}
	//ONGOING
	public function update_history($id_permintaan){
		$this->load->model('model_proses');
		$data['rating'] = $this->input->post('rating');
		$data['tanggapan'] = $this->input->post('tanggapan');
		$this->model_proses->update_history($id_permintaan,$data);
		$this->load->model('model_admin');
		$data2['id_permintaan'] = $this->input->post('id_permintaan');
		$data2['status_review'] = '1';
		$this->model_admin->update_stat($data2);
		redirect('home');
	}

	public function update_profile(){
		$this->load->model('model_proses');
		$data['id_user'] = $this->input->post('id_user');
		$data['nama'] = $this->input->post('nama');
		$data['email'] = $this->input->post('email');
		if ($this->input->post('password')!=NULL) {
			$data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		}else{
			
		}
		$this->model_proses->update_profile($data);
		redirect('home');
	}
	

}
