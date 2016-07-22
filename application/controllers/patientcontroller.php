<?php


class PatientController extends Controller {
    
    
	function index($id = null){
	 
	    switch ($this->get_request_method()) {
		case 'GET':
		    $result = $this->Patient->get_patient($id);
		    echo json_encode($result);
		break;
	    
            case 'PUT':
		$result = $this->Patient->update_patient($this->_request);
		echo json_encode($result);
		break;
		
            case 'POST':
		$result = $this->Patient->insert_patient($_POST);
		echo json_encode($result);
		break;
	    
            case 'DELETE':
		$result = $this->Patient->delete_patient($this->_request);
		echo json_encode($result);
		break;
        }
	die;
	    
	  
	}
}
