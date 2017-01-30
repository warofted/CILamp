<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class pokes extends CI_Controller {

	protected $view_data = array();
	protected $user_session = NULL;


	function __construct()
	{
		parent::__construct();
		$this->view_data['user_session'] = $this->user_session = $this->session->userdata("user_session");
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function login()
	{
		if(!isset($_SESSION))
		$this->load->library('session');
		$this->load->library("form_validation");
		$this->form_validation->set_rules("email", "trim|valid_email|required");
		$this->form_validation->set_rules("pass", "passconf", "trim|min_length[8]|required|md5");
				if($this->form_validation->run() === FALSE)
				{
					$this->session->error("login_errors", validation_errors());
					redirect(base_url());
				}
				else
				{
					$this->load->model("users");
					$loginfo = $this->users->user_login($this->input->post());

					if ($user_login)
					{
						$this->session->set_userdata("user_session", $user_login);
						redirect(base_url("view/mainpage"));
					}
					else
					{
						$this->session->error("login_errors", "Invalid email and/or password");
						redirect(base_url());
					}
				}
			}



	public function user_register()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("name", "alias", "trim|required");
		$this->form_validation->set_rules("email", "trim|valid_email|required");
		$this->form_validation->set_rules("pass", "passconf", "trim|min_length[8]|required|matches[confirm_password]|md5");
		$this->load->model("users");
		$register = $this->input->post();
		$user_register = $this->users->user_input($register);

		$this->load->view("login");
	}


	public function logout()
	{
		$user_session_data = $this->session->all_userdata();

		foreach($user_session_data as $key)
			{
				$this->session->unset_userdata($key);
			}

				$this->session->sess_destroy();
				redirect(base_url());
	}

}
