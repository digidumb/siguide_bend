<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
	
class Location extends REST_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Kec_model', '', TRUE);
	}
	
	//return 1 kecamatan
	function kec_get() {
		if(!$this->get('id')) {
			$this->response(NULL, 400);
		}
		
		$kec = $this->Kec_model->get($this->get('id'));
		
		if ($kec) {
			$this->response($kec, 200);
		} else {
			$this->response(NULL, 404);
		}
		
	}
	
	function kec_post() {
		$arr_kec = array('name' => $this->post('name'));
		
		$result = $this->Kec_model->update($this->post('id'), $arr_kec);
		
		if ($result === FALSE) {
			$this->response(array('status' => 'failed'));
		} else {
			$this->response(array('status' => 'success'));
		}
		
	}
	
	function users_get() {
		$kecs = $this->Kec_model->get_all();
		if ($kecs) {
			$this->response($users,200);
		} else {
			$this->response(NULL,404);
		}
	}
	
	
}
?>