<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{

		$this->load->view('login');
	}

	public function login()
	{
		$form_data = $this->input->post();
		$user_data = $this->user->get_user_by_username($form_data['username']);

		$result = $this->user->login($user_data, $form_data['password']);
		if($result == "success" ){
			$this->load->view('main', $result);
		}else{
			$this->session->set_flashdata('input_errors', $result);
			$this->load->view('login');
		}
		
	}

	public function forgot()
	{
		$this->load->view('main');
	}
}
