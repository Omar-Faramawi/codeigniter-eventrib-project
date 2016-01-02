<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function index()
	{
		if($this->check_authority() == true){
			$credentials = $this->get_credentials_objcet();
			$data = $this->get_header_data();
			$data['events'] = $this->get_canvas_right_data();
			$data["menubar"] = 0;
			$this->load->view("event/header", $data);
			$this->load->view("event/offcanvas-left", $data);
			$this->load->view("event/content", $data);
			//$this->load->view("application/menubar", $data);
			$this->load->view("event/offcanvas-right", $data);
			$this->load->view("event/footer", $data);
		}
	}

	protected function get_canvas_right_data(){
		$credentials = $this->get_credentials_objcet();
		$this->load->model("event_model", "Event");
		$data = $this->Event->get_events($credentials);
		return $data;
	}

	protected function get_header_data(){
		$this->load->model("application_user_model", 'User');
		$credentials = $this->get_credentials_objcet();
		$userData = $this->User->get_user_data($this->session->userdata("username"), $credentials);
		$data = array("title" => $userData->title,"username" => $userData->fullName, "user_avatar" => $userData->avatar, "app_name" => $this->session->userdata("app_name"), "app_logo" => $this->session->userdata("app_logo"));
		return $data;
	}

	protected function get_credentials_objcet(){
		$credentials = new stdClass;
		$credentials->app_id = $this->session->userdata("app_id");
		$credentials->rest_key = $this->session->userdata("rest_key");
		$credentials->master_key = $this->session->userdata("Master_key");
		return $credentials;
	}

	protected function check_authority(){
		if($this->session->userdata("user")){
			if($this->session->userdata("app_id") && $this->session->userdata("rest_key") && $this->session->userdata("master_key")){
				return true;
			}else{
				redirect(base_url().'router/org_picker/'.$this->session->userdata("user"));	
			}
		}else{
			redirect(base_url().'router/login');
		}
	}
}

/* End of file dasboard.php */
/* Location: ./application/controllers/dashboard.php */