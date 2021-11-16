<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
	 	$this->load->model('model_admin');
	 	$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
		$data['datahistory'] = $this->model_admin->tampilkan_data_history();
	 	$this->load->view('admin',$data);
	 }
  
	public function permintaan()
	{
		$this->load->model('model_admin');
		$datapermintaan['datapermintaan'] = $this->model_admin->tampilkan_data_permintaan();
		$this->load->view('permintaan',$datapermintaan);		
	}

	public function complete_permintaan($id_permintaan){
		$this->load->model('model_admin');
		$data['status'] = 'Complete';
		$this->model_admin->update_approve($id_permintaan,$data);
		redirect('admin/permintaan');
	}

	public function pending_permintaan($id_permintaan){
		$this->load->model('model_admin');
		$data['status'] = 'Pending';
		$this->model_admin->update_pending($id_permintaan,$data);
		redirect('admin/permintaan');
	}

	public function proccess_permintaan($id_permintaan){
		$this->load->model('model_admin');
		$data['status'] = 'In Proccess';
		$this->model_admin->update_pending($id_permintaan,$data);
		redirect('admin/permintaan');
	}

	public function delete_permintaan($id_permintaan){
		$this->load->model('model_admin');
		$this->model_admin->hapus_data_permintaan($id_permintaan);
		redirect('admin/permintaan');
	}

	public function history()
	{
		$this->load->model('model_admin');
		$datahistory['datahistory'] = $this->model_admin->tampilkan_data_history();
		$this->load->view('history',$datahistory);		
	}

	public function search_history()
	{
		$this->load->model('model_admin');
		$keyword = $this->input->post('keyword');	
		$datahistory['datahistory'] = $this->model_admin->tampilkan_data_history_keyword($keyword);
		$this->load->view('history',$datahistory);
	}

	public function proses(){
		date_default_timezone_set('Asia/Jakarta');
		$data['nama'] = $this->input->post('teknisi');
		$data['bagian'] = $this->input->post('cpenyelesaian');
		$this->load->model('model_proses');
		$this->model_proses->insert_history($data);
		redirect('home/history');
	}	

	public function add_history(){
		date_default_timezone_set('Asia/Jakarta');
		$data2['id_permintaan'] = $this->input->post('id_permintaan');
		$data2['id_user'] = $this->input->post('id_user');
		$data2['nama'] = $this->input->post('nama');
		$data2['bagian'] = $this->input->post('bagian');
		$data2['permasalahan'] = $this->input->post('permasalahan');
		$data2['tanggal_permintaan'] = $this->input->post('tanggal_permintaan');
		$data2['tpc'] = date("m");
		$data2['jam_permintaan'] = $this->input->post('jam_permintaan');
		$data2['status'] = 'Complete';
		$data2['cara_penyelsaian'] = $this->input->post('cara_penyelsaian');
		$data2['waktu_pengerjaan'] = date("H:i:s");
		$data2['tanggapan'] = $this->input->post('tanggapan');
		$data2['teknisi'] = $this->input->post('teknisi');
		$data2['rating'] = $this->input->post('rating');
		$this->load->model('model_proses');
		$this->model_proses->insert_history($data2);
		$this->load->model('model_admin');
		$data['id_permintaan'] = $this->input->post('id_permintaan');
		$data['status'] = 'Complete';
		$this->model_admin->update_approve($data);
		redirect('admin/permintaan');
	}

	public function export_excel(){
		$data['history']=$this->model_admin->ambil_data('history')->result();
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties->setCreator("Salman Fashal");
		$objPHPExcel->getProperties->setLastModifiedBy("Salman Faishal");
		$objPHPExcel->getProperties->setTitle("Laporan History");
		$objPHPExcel->getProperties->setSubject("");
		$objPHPExcel->getProperties->setDescription("Laporan History");

		$objPHPExcel->setActiveSheetIndex(0);

		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'No');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Nama');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Bagian');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Pesan Permasalahan');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Tanggal Permintaan');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'Jam Permintaan');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'Cara Penyelesaian');
        $objPHPExcel->getActiveSheet()->setCellValue('H1', 'Waktu Pengerjaan');
        $objPHPExcel->getActiveSheet()->setCellValue('I1', 'Tanggapan');
        $objPHPExcel->getActiveSheet()->setCellValue('J1', 'Teknisi');
        $objPHPExcel->getActiveSheet()->setCellValue('K1', 'Rating');
	
        $baris=2;
        $x =1;
        foreach ($data['history'] as $data) {
        $objPHPExcel->getActiveSheet()->setCellValue('A', $baris,$x);
        $objPHPExcel->getActiveSheet()->setCellValue('B', $baris,$data->nama);
        $objPHPExcel->getActiveSheet()->setCellValue('C', $baris,$data->bagian);
        $objPHPExcel->getActiveSheet()->setCellValue('D', $baris,$data->permasalahan);
        $objPHPExcel->getActiveSheet()->setCellValue('E', $baris,$data->tanggal_permintaan);
        $objPHPExcel->getActiveSheet()->setCellValue('F', $baris,$data->jam_permintaan);
        $objPHPExcel->getActiveSheet()->setCellValue('G', $baris,$data->cara_penyelesaian);
        $objPHPExcel->getActiveSheet()->setCellValue('H', $baris,$data->waktu_pengerjaan);
        $objPHPExcel->getActiveSheet()->setCellValue('I', $baris,$data->tanggapan);
        $objPHPExcel->getActiveSheet()->setCellValue('J', $baris,$data->teknisi);
        $objPHPExcel->getActiveSheet()->setCellValue('K', $baris,$data->rating);
        
        $x++;	
        $baris++;	
        }

        $filename="Laporan-History".date("d-m-Y-H-i-s").'.xlsx';
        $objPHPExcel->getActiveSheet()->setTitle("Laporan History");
        header('content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('content-Disposition: attachment; filename=$filename ');
        header('cache-Control: max-age-0');

        $writer=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
        $writer->save('php://output');

        exit;
	}
}


