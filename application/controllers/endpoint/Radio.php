<?php 
require_once(APPPATH.'/libraries/REST_Controller.php');

class Radio extends REST_Controller
{
	function getall_get()
	{
		
		$data = null;
		$id = $this->get('id');
		
		if(!$id)
		{
			
        header('Content-type: application/json');
		$cats = $this->radio_model->get_all()->result();
		
		    foreach ($cats as $cat)
		    {
			    $data = $cat;
		    }
		    $this->response($data);

		} else {

		    header('Content-type: application/json');
		    $cats = $this->radio_model->get_all_by_cat($id)->result();
		
		    $this->response($cats);

		}
	}
	
}
?>