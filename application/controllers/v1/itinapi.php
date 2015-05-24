<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
	
class Itinapi extends REST_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Itin_model', '', TRUE);
	}
	
	//return 1 itin
	function itin_get() {
		if(!$this->get('id')) {
			$this->response(NULL, 400);
		}
		
		$kec = $this->Itin_model->get($this->get('id'));
		
		if ($kec) {
			$this->response($kec, 200);
		} else {
			$this->response(NULL, 404);
		}
		
	}
	
	//return all itin
	function itins_get() {
		$itins = $this->Itin_model->get_all();
		
		if ($itins) {
			$this->response($itins,200);
		} else {
			$this->response(NULL,400);
		}
	}
	
	//create new itin
	function itin_post() {
		$itin = array('creator_id' => $this->post('creator_id'),'tags' => $this->post('tags'), 'createtype' => date("Y-m-d H:i:s"));
		$result = $this->itin_model->create($itin);
		
		 if($result === FALSE){
            $this->response(array('status' => 'failed'));
        }else{
            $this->response(array('status' => 'success'));
        }
	}
	
}

?>