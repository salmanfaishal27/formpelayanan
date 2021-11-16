<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
	// public function __construct(){
 //        parent::__construct();
 //        $this->load->library('form_validation');
 //        $this->load->helper('url','form');
 //        $this->load->model('model_proses'); //call model
 //    }
	public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url','form');
        //$this->load->model('model_proses'); //call model
    }
	public function index()
	{	
		$this->form_validation->set_rules('email','Email','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');
		if ( $this->form_validation->run() == false){
		$data['title']= 'Login';
		$this->load->view('auth/login',$data);		
	}else{
		$this->_login();
	}
}
	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user',['email'=>$email])->row_array();
		
		//jika usernya ada 
		if($user)
		{
			//jika usernya aktif
			if($user['is_active'] == 1){
				//cek password
				if(password_verify($password, $user['password'])){
					$data = [
						'email'=> $user['email'],
						'role_id'=> $user['role_id']
					];
					$this->session->set_userdata($data);
					if($user ['role_id'] == 1){
						redirect('admin');
					}else{
						redirect('home');
					}
					redirect('home');
				}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Wrong password!. </div>');
				redirect('auth');					
				}
			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Account has not activated!. </div>');
				redirect('auth');
			}
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Account is not registered!. </div>');
		redirect('auth');
		}	
			}	
			

	public function registration()
	{
		$data['title'] = 'Registration';
		$this->form_validation->set_rules('nama','Name','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]',[
			'is_unique'=>'This email has already registered !'
		]);	
		$this->form_validation->set_rules('password1','Password','required|trim|min_length[6]|matches[password2]',[
		'min_length'=>'Password too short!, min 6 character']);
		$this->form_validation->set_rules('password2','Password','required|trim|min_length[6]|matches[password1]');
		if ( $this->form_validation->run() == false){
		$data['title'] = 'Registration'; 
		$this->load->view('auth/registration',$data);
	}else{
		$data =[
		'nama' => htmlspecialchars($this->input->post('nama',true)),
		'email' => htmlspecialchars($this->input->post('email',true)),
		'image' => 'default.jpg',
		'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
		'role_id'=>2,
		'is_active'=>1,
		'date_created'=> time()
	];
		$this->load->model('model_proses');
		$this->model_proses->insert_regist($data);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Congratulation ! your account has been created, Please login. </div>');
		redirect('auth');		
		  }
		
	}

	// public function _sendEmail()
	// {

	// }

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> You have been logged out. </div>');
		redirect('auth');		
	}	
	public function  blocked()
	{
		echo 'access blocked';
	}

	// public function forgotPassword()
	// {
	// 	$this->form_validation->set_rules('email','Email','trim|trim|required|valid_email');
	// 	if ($this->form_validation->()==false){


	// 	$this->load->view('auth/forgot-password');
	// }else{
	// 	$email = $this->input->post('email');
	// 	$user = $this->db->get_where('user',['email'=>$email,'is_active'=>1])->row_array();
	// 	if($user){
	// 		$token=base64_encode(random_bytes(32));
	// 		$user_token=[
	// 		'email'=>$email,
	// 		'token'=>$token,
	// 		'date_created'=>time()
	// 	$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> please check your email to reset password. </div>');
	// 	redirect('auth/forgotPassword');
	// 		];

	// 	$this->db->insert('user_token',$user_token);
	// 	$this->_sendEmail($token,'forgot');	
	// 	}else{
	// 	$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> email is not registered! or activated. </div>');
	// 	redirect('auth/forgotPassword');			
	// 	}

	//   	}
	// }

}
