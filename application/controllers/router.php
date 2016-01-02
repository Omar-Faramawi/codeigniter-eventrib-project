<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Router extends CI_Controller
{
    
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
        if ($this->session->userdata("user")) {
            redirect(base_url() . 'router/org_picker/' . $this->session->userdata('user'));
        } else {
            $this->load->view('login');
        }
    }
    
    public function login()
    {
        $this->load->model('user_model', 'User');
        $this->load->model('application_model', 'Application');
        
        if(get_cookie("eventribe-remember-token") != ""){
        	$login = $this->User->get_user_from_token(get_cookie("eventribe-remember-token"));
        	$this->session->set_userdata("user", $login);
            redirect(base_url() . 'router/org_picker/' . $login);
        }else{
        	$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[250]');
	        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[250]');
	        
	        //run validation
	        if ($this->form_validation->run() == FALSE) {
	            
	            $this->session->set_flashdata('errors', validation_errors());
	            redirect(base_url());
	            
	        } else {
	            $login = $this->User->login($this->input->post('username'), $this->input->post('password'));
	            if ($login != "" && $login != "invalid login parameters") {
	            	$this->session->set_userdata("user", $login);
	            	$this->session->set_userdata("username", $this->input->post("username"));
	            	$this->session->set_userdata("password", $this->input->post("password"));
	                if($this->input->post("remember") == 1){
	                	$token = $this->User->set_remember_me($this->input->post("username"), $this->input->post("password"));
	                	$expire = time() + 2678400;
	                	$cookie = array(
						    'name'   => 'eventribe-remember-token',
						    'value'  => $token,
						    'expire' => $expire,
						    'secure' => TRUE
						);
						set_cookie($cookie);
	                }
	                redirect(base_url() . 'router/org_picker/' . $login);
	            } else {
	                $this->session->set_flashdata('errors', $login);
	                redirect(base_url());
	            }
	        }
        }
    }
    
    public function org_picker($user)
    {
        $this->load->model('application_model', 'Application');
        if ($this->session->userdata("user") && $user == $this->session->userdata("user")) {
            $apps = $this->Application->get_applications($user);
            $this->load->view("org_picker", array(
                "data" => $apps
            ));
        } else {
            redirect(base_url());
        }
    }
    
    public function logout()
    {
        $this->load->model('user_model', 'User');
        $logout = $this->User->logout($this->session->userdata("username"), $this->session->userdata("password"));
        delete_cookie("eventribe-remember-token");
    	$this->session->sess_destroy();
    	redirect(base_url());
    }
    
    public function route($appId)
    {
        if($this->session->userdata("user")){
        	$this->load->model('application_model', 'Application');
        	$credentials = $this->Application->get_application_credentials($appId, $this->session->userdata("user"));
        	if(isset($credentials['credentials']) == false || $credentials['credentials'] == NULL){
        		$this->session->set_flashdata("errors", "This application is not exist anymore or has no credentials");
        		redirect(base_url()."router/org_picker/".$this->session->userdata("user"));
        	}else if(is_array($credentials['credentials'])){
        		$this->session->set_userdata("app_id", $credentials['credentials']['application_id']);
        		$this->session->set_userdata("rest_key", $credentials['credentials']['rest_api_key']);
        		$this->session->set_userdata("master_key", $credentials['credentials']['master_key']);
        		$this->session->set_userdata("app_name", $credentials['name']);
        		$this->session->set_userdata("app_logo", $credentials['logo']);
                $this->session->set_userdata("app_type", $credentials['type']);
        		redirect(base_url()."dashboard");
        	}else{
        		$this->session->set_flashdata("errors", $credentials);
        		redirect(base_url()."router/org_picker/".$this->session->userdata("user"));
        	}
        }else{
        	redirect(base_url()."router/org_picker/".$this->session->userdata("user"));
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */