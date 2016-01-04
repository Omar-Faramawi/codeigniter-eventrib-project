<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require 'dashboard.php';
class Event extends Dashboard {

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
		$this->load->view('welcome_message');
	}

	public function create(){
		if(parent::check_authority() == true){
			if($this->session->userdata('app_type') == 'multiple'){
				$data = parent::get_header_data();
				$data['events'] = parent::get_canvas_right_data();
				$data['menubar'] = 0;
				$data['current'] = "Features";
				$this->load->view("event/header", $data);
				$this->load->view("event/offcanvas-left", $data);
				$this->load->view("event/create-event-header", $data);
				$this->load->view("event/create", $data);
				$this->load->view("event/app-preview");
				//$this->load->view("application/menubar", $data);
				$this->load->view("event/offcanvas-right", $data);
				$this->load->view("event/footer", $data);
			}else{
				redirect(base_url().'dashboard');
			}
		}
	}

	public function create_content(){
		if(parent::check_authority() == true){
			if(get_cookie('event-create-step1') != ""){
				$data = parent::get_header_data();
				$data['events'] = parent::get_canvas_right_data();
				$data['menubar'] = 0;
				$data['current'] = "Content";
				$getCookie = unserialize(get_cookie('event-create-step1'));
				$data['step1'] = $getCookie;
				$data['features'] = $getCookie['features'];
				$this->load->view("event/header", $data);
				$this->load->view("event/offcanvas-left", $data);
				$this->load->view("event/create-event-header", $data);
				$this->load->view("event/create-content", $data);
				$this->load->view("event/app-preview");
				//$this->load->view("application/menubar", $data);
				$this->load->view("event/offcanvas-right", $data);
				$this->load->view("event/footer", $data);	
			}else{
				$this->session->set_flashdata('errors', "You have to fill event basic information first");
	            redirect(base_url().'event/create');
			}
		}
	}

	public function create_appstore(){
		if(parent::check_authority() == true){
			$data = parent::get_header_data();
			$data['events'] = parent::get_canvas_right_data();
			$data['menubar'] = 0;
			$data['current'] = "AppStore";
			$this->load->view("event/header", $data);
			$this->load->view("event/offcanvas-left", $data);
			$this->load->view("event/create-event-header", $data);
			$this->load->view("event/create-app-store", $data);
			$this->load->view("event/app-preview");
			//$this->load->view("application/menubar", $data);
			$this->load->view("event/offcanvas-right", $data);
			$this->load->view("event/footer", $data);
		}
	}

	public function create_review(){
		if(parent::check_authority() == true){
			$data = parent::get_header_data();
			$data['events'] = parent::get_canvas_right_data();
			$data['menubar'] = 0;
			$data['current'] = "Review";
			$this->load->view("event/header", $data);
			$this->load->view("event/offcanvas-left", $data);
			$this->load->view("event/create-event-header", $data);
			$this->load->view("event/create-review", $data);
			$this->load->view("event/app-preview");
			//$this->load->view("application/menubar", $data);
			$this->load->view("event/offcanvas-right", $data);
			$this->load->view("event/footer", $data);
		}
	}

	public function create_submit(){
		if(parent::check_authority() == true){
			$data = parent::get_header_data();
			$data['events'] = parent::get_canvas_right_data();
			$data['menubar'] = 0;
			$data['current'] = "Submit";
			$this->load->view("event/header", $data);
			$this->load->view("event/offcanvas-left", $data);
			$this->load->view("event/create-event-header", $data);
			$this->load->view("event/create-submit", $data);
			$this->load->view("event/app-preview");
			//$this->load->view("application/menubar", $data);
			$this->load->view("event/offcanvas-right", $data);
			$this->load->view("event/footer", $data);
		}
	}

	public function features_submit(){
		if(parent::check_authority() == true){
        	$this->form_validation->set_rules('event-name', 'Event name', 'required|min_length[2]|htmlspecialchars|trim|xss_clean');
        	$this->form_validation->set_rules('event-description', 'Event description', 'required|min_length[5]|htmlspecialchars|trim|xss_clean');
        	$this->form_validation->set_rules('order', 'Order', 'required|numeric|htmlspecialchars|trim|xss_clean');
        	$this->form_validation->set_rules('primary-color', 'Primary color', 'required|min_length[5]|htmlspecialchars|trim|xss_clean');
        	$this->form_validation->set_rules('accent-color', 'Accent color', 'required|min_length[5]|htmlspecialchars|trim|xss_clean');

        	if ($this->form_validation->run() == FALSE) {
	            $this->session->set_flashdata('errors', validation_errors());
	            redirect(base_url().'event/create');
	        }else{
	        	
	        	$config['upload_path'] = 'uploads/tmp/';
				$config['allowed_types'] = 'jpg|png|ico|ICO|JPG|JPEG|PNG';
				$config['max_size']	= '5000';

				$this->load->library('upload', $config);

				$icon = 'icon';
				if($this->upload->do_upload($icon) == FALSE){
					$this->session->set_flashdata('errors', $this->upload->display_errors());
					redirect(base_url().'event/create');
				}else{
					$file_data = $this->upload->data();
					if($file_data['image_width'] < 666){
						unlink('uploads/tmp/'.$file_data['file_name']);
						$this->session->set_flashdata('errors', "The minimum icon width is 666 pixels");
						redirect(base_url().'event/create');
					}elseif($file_data['image_height'] < 666){
						unlink('uploads/tmp/'.$file_data['file_name']);
						$this->session->set_flashdata('errors', "The minimum icon height is 666 pixels");
						redirect(base_url().'event/create');
					}
					$icon_name = $file_data['file_name'];
					$thumbnail = 'thumbnail';
					if($this->upload->do_upload($thumbnail) == FALSE){
						$this->session->set_flashdata('errors', $this->upload->display_errors());
						redirect(base_url().'event/create');	
					}else{
						$file_data = $this->upload->data();
						$thumbnail_name = $file_data['file_name'];
					}

				}
	        }
		}
		//Save data in cookie
		if(get_cookie('event-create-step1') != ""){
        	delete_cookie('event-create-step1');
        }
		$cookie_data = array(
			'event-name' => $this->input->post('event-name'),
			'event-description' => $this->input->post('event-description'),
			'order' => $this->input->post('order'),
			'primary-color' => $this->input->post('primary-color'),
			'accent-color' => $this->input->post('accent-color'),
			'features' => array(
				'agenda' => $this->input->post('agenda'),
				'exhibitors' => $this->input->post('exhibitors'),
				'askq' => $this->input->post('askq'),
				'messages' => $this->input->post('messages'),
				'speakers' => $this->input->post('speakers'),
				'profile' => $this->input->post('profile'),
				'surveys' => $this->input->post('surveys'),
				'qr' => $this->input->post('qr'),
				'exmap' => $this->input->post('exmap'),
				'inmap' => $this->input->post('inmap'),
				'switchEvent' => $this->input->post('switchEvent'),
				'photos' => $this->input->post('photos'),
				'ideas' => $this->input->post('ideas'),
				'people' => $this->input->post('people')
				),
			'icon_name' => $icon_name,
			'thumbnail_name' => $thumbnail_name
			);
		$serialized_cookie = serialize($cookie_data);
	    $expire = time() + 2678400;
		$cookie = array(
					'name'   => 'event-create-step1',
					'value'  => $serialized_cookie,
					'expire' => $expire,
					'secure' => FALSE
				);
		set_cookie($cookie);
		redirect(base_url().'event/create_content');
	}

	public function cookie_test(){
		$getCookie = get_cookie('event-create-step1');
		$array = unserialize($getCookie);
		//echo $array['features']['speakers'];
		print_r($array);

	}

	public function content_submit(){
		$config['upload_path'] = 'uploads/tmp/';
		$config['allowed_types'] = 'jpg|png|ico|ICO|JPG|JPEG|PNG';
		$config['max_size']	= '5000';

		$this->load->library('upload', $config);

		$speakers = array();
		$surveys = array();
		$exhibitors = array();
		$agenda = array();
		$exmapPoints = array();
		$inmapSections = array();

		for($i = 0; $i < intval($this->input->post('speakers-length')); $i++){
			if($this->upload->do_upload('speaker-'.$i.'-image')){
				$file_data = $this->upload->data();
				$speaker_image = $file_data['file_name'];
			}else{
				$speaker_image = "";
			}
			// $this->upload->do_upload('speaker-'.$i.'-image');
			// $file_data = $this->upload->data();
			// $speaker_image = $file_data['file_name'];

			// $speaker = new stdClass;
			// $speaker->name = $this->input->post('speaker-'.$i.'-name');
			// $speaker->title = $this->input->post('speaker-'.$i.'-title');
			// $speaker->company = $this->input->post('speaker-'.$i.'-company');
			// $speaker->email = $this->input->post('speaker-'.$i.'-email');
			// $speaker->introduction = $this->input->post('speaker-'.$i.'-introduction');
			// $speaker->order = $this->input->post('speaker-'.$i.'-order');
			// $speaker->facebook = $this->input->post('speaker-'.$i.'-facebook');
			// $speaker->twitter = $this->input->post('speaker-'.$i.'-twitter');
			// $speaker->linkedin = $this->input->post('speaker-'.$i.'-linkedin');
			// $speaker->company = $this->input->post('speaker-'.$i.'-company');
			// $speaker->image = $speaker_image;

			$speaker = array(
					"name" => $this->input->post('speaker-'.$i.'-name'),
					"title" => $this->input->post('speaker-'.$i.'-title'),
					"company" => $this->input->post('speaker-'.$i.'-company'),
					"email" => $this->input->post('speaker-'.$i.'-email'),
					"introduction" => $this->input->post('speaker-'.$i.'-introduction'),
					"order" => $this->input->post('speaker-'.$i.'-order'),
					"facebook" => $this->input->post('speaker-'.$i.'-facebook'),
					"twitter" => $this->input->post('speaker-'.$i.'-twitter'),
					"linkedin" => $this->input->post('speaker-'.$i.'-linkedin'),
					"company" => $this->input->post('speaker-'.$i.'-company'),
					"image" => $speaker_image
				);

			array_push($speakers, $speaker);
		}

		for($i = 0; $i < intval($this->input->post('exhibitors-length')); $i++){
			// $this->upload->do_upload('exhibitor-'.$i.'-image');
			// $file_data = $this->upload->data();
			// $exhibitor_image = $file_data['file_name'];

			if($this->upload->do_upload('exhibitor-'.$i.'-image')){
				$file_data = $this->upload->data();
				$exhibitor_image = $file_data['file_name'];
			}else{
				$exhibitor_image = "";
			}

			// $exhibitor = new stdClass;
			// $exhibitor->name = $this->input->post('exhibitor-'.$i.'-name');
			// $exhibitor->about = $this->input->post('exhibitor-'.$i.'-about');
			// $exhibitor->action = $this->input->post('exhibitor-'.$i.'-action');
			// $exhibitor->order = $this->input->post('exhibitor-'.$i.'-order');
			// $exhibitor->facebook = $this->input->post('exhibitor-'.$i.'-facebook');
			// $exhibitor->twitter = $this->input->post('exhibitor-'.$i.'-twitter');
			// $exhibitor->linkedin = $this->input->post('exhibitor-'.$i.'-linkedin');
			// $exhibitor->url = $this->input->post('exhibitor-'.$i.'-url');
			// $exhibitor->image = $exhibitor_image;

			$exhibitor = array(
					"name" => $this->input->post('exhibitor-'.$i.'-name'),
					"about" => $this->input->post('exhibitor-'.$i.'-about'),
					"action" => $this->input->post('exhibitor-'.$i.'-action'),
					"order" => $this->input->post('exhibitor-'.$i.'-order'),
					"facebook" => $this->input->post('exhibitor-'.$i.'-facebook'),
					"twitter" => $this->input->post('exhibitor-'.$i.'-twitter'),
					"linkedin" => $this->input->post('exhibitor-'.$i.'-linkedin'),
					"url" => $this->input->post('exhibitor-'.$i.'-url'),
					"image" => $exhibitor_image
				);

			array_push($exhibitors, $exhibitor);
		}

		for($i = 0; $i < intval($this->input->post('exmapPoints-length')); $i++){
			// $exmapPoint = new stdClass;
			// $exmapPoint->pin_name = $this->input->post('exmapPoint-'.$i.'-pin_name');
			// $exmapPoint->address = $this->input->post('exmapPoint-'.$i.'-address');
			// $exmapPoint->lat = $this->input->post('exmapPoint-'.$i.'-lat');
			// $exmapPoint->long = $this->input->post('exmapPoint-'.$i.'-long');

			$exmapPoint = array(
					"pin_name" => $this->input->post('exmapPoint-'.$i.'-pin_name'),
					"address" => $this->input->post('exmapPoint-'.$i.'-address'),
					"lat" => $this->input->post('exmapPoint-'.$i.'-lat'),
					"long" => $this->input->post('exmapPoint-'.$i.'-long'),
					"order" => $this->input->post('exmapPoint-'.$i.'-order')
				);

			array_push($exmapPoints, $exmapPoint);
		}

		for($i = 0; $i < intval($this->input->post('inmapSections-length')); $i++){
			// $this->upload->do_upload('inmapSection-'.$i.'-image');
			// $file_data = $this->upload->data();
			// $inmapSection_image = $file_data['file_name'];

			if($this->upload->do_upload('inmapSection-'.$i.'-image')){
				$file_data = $this->upload->data();
				$inmapSection_image = $file_data['file_name'];
			}else{
				$inmapSection_image = "";
			}

			// $inmapSection = new stdClass;
			// $inmapSection->header = $this->input->post('inmapSection-'.$i.'-header');
			// $inmapSection->image = $inmapSection_image;

			$inmapSection = array(
					"header" => $this->input->post('inmapSection-'.$i.'-header'),
					"image" => $inmapSection_image
				);

			array_push($inmapSections, $inmapSection);
		}

		for($i = 0; $i < intval($this->input->post('surveys-length')); $i++){
			// $survey = new stdClass;
			// $survey->name = $this->input->post('survey-'.$i.'-name');
			// $survey->description = $this->input->post('survey-'.$i.'-description');
			// $survey->order = $this->input->post('survey-'.$i.'-order');

			$survey = array(
					"name" => $this->input->post('survey-'.$i.'-name'),
					"description" => $this->input->post('survey-'.$i.'-description'),
					"order" => $this->input->post('survey-'.$i.'-order')
				);

			$questions = array();
			for($y = 0; $y < intval($this->input->post('survey-'.$i.'-q-length')); $y++){
				array_push($questions, $this->input->post('survey-'.$i.'-q-'.$y));
			}
			$survey['questions'] = $questions;

			array_push($surveys, $survey);
		}

		for($i = 0; $i < intval($this->input->post('agenda-length')); $i++){
			//$day = new stdClass;
			//$day->day = $this->input->post('day-'.$i.'-day');

			$day = array(
					"day" => $this->input->post('day-'.$i.'-day'),
					"date" => $this->input->post('day-'.$i.'-date'),
					"dayorder" => $this->input->post('day-'.$i.'-dayorder')
				);

			$items = array();
			for($y = 0; $y < intval($this->input->post('day-'.$i.'-items-length')); $y++){
				// $this->upload->do_upload('day-'.$i.'-item-'.$y.'-image');
				// $file_data = $this->upload->data();
				// $item_image = $file_data['file_name'];

				if($this->upload->do_upload('day-'.$i.'-item-'.$y.'-image')){
					$file_data = $this->upload->data();
					$item_image = $file_data['file_name'];
				}else{
					$item_image = "";
				}
				// $item = new stdClass;
				// $item->title = $this->input->post('day-'.$i.'-item-'.$y.'-title');
				// $item->description = $this->input->post('day-'.$i.'-item-'.$y.'-description');
				// $item->from = $this->input->post('day-'.$i.'-item-'.$y.'-from');
				// $item->to = $this->input->post('day-'.$i.'-item-'.$y.'-to');
				// $item->speaker = $this->input->post('day-'.$i.'-item-'.$y.'-speaker');
				// $item->image = $item_image;

				$item = array(
						"title" => $this->input->post('day-'.$i.'-item-'.$y.'-title'),
						"description" => $this->input->post('day-'.$i.'-item-'.$y.'-description'),
						"from" => $this->input->post('day-'.$i.'-item-'.$y.'-from'),
						"to" => $this->input->post('day-'.$i.'-item-'.$y.'-to'),
						"speaker" => $this->input->post('day-'.$i.'-item-'.$y.'-speaker'),
						"order" => $this->input->post('day-'.$i.'-item-'.$y.'-order'),
						"image" => $item_image
					);

				array_push($items, $item);
			}
			$day['items'] = $items;

			array_push($agenda, $day);
		}

		//Save data in cookie
		// if(get_cookie('event-create-step2') != ""){
  //       	delete_cookie('event-create-step2');
  //       }
		$cookie_data = array(
			'speakers' => $speakers,
			'exhibitors' => $exhibitors,
			'agenda' => $agenda,
			'exmapPoints' => $exmapPoints,
			'inmapSections' => $inmapSections,
			'surveys' => $surveys
			);
		//print_r($cookie_data);
		$credentials = parent::get_credentials_objcet();
		$this->load->model('event_model', 'EventModel');
		$event = $this->EventModel->save_event(unserialize(get_cookie('event-create-step1')), $cookie_data, $credentials);
		if(is_array($event)){
			print_r($event);
		}else{
			echo $event;
		}
		// $serialized_cookie = serialize($cookie_data);
	 //    $expire = time() + 2678400;
		// $cookie = array(
		// 			'name'   => 'event-create-step2',
		// 			'value'  => $serialized_cookie,
		// 			'expire' => $expire,
		// 			'secure' => FALSE
		// 		);
		// set_cookie($cookie);

		// print_r(unserialize(get_cookie('event-create-step2')));
		//echo $serialized_cookie;
		
		// $this->session->unset_userdata('speakers');
		// $this->session->unset_userdata('exhibitors');
		// $this->session->unset_userdata('exmapPoints');
		// $this->session->unset_userdata('agenda');
		// $this->session->unset_userdata('exmapPoints');
		// $this->session->unset_userdata('inmapSections');
		// $this->session->unset_userdata('surveys');


		// $this->session->set_userdata('speakers',  serialize($speakers));
		// $this->session->set_userdata('exhibitors',  serialize($exhibitors));
		// $this->session->set_userdata('agenda',  serialize($agenda));
		// $this->session->set_userdata('exmapPoints',  serialize($exmapPoints));
		// $this->session->set_userdata('inmapSections',  serialize($inmapSections));
		// $this->session->set_userdata('surveys', serialize( $surveys));

		//print_r($this->session->userdata);
		//echo $this->session->userdata('content-submit');
		//print_r(unserialize($this->session->userdata('content-submit')));

		//print_r($serialized_cookie);

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */