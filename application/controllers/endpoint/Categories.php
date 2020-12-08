<?php 
require_once(APPPATH.'/libraries/REST_Controller.php');
class Categories extends REST_Controller
{
	function get_get()
	{
		$data = null;

		header('Content-type: application/json');
		$cats = $this->category_model->get_all()->result();
		foreach ($cats as $cat)
		{
			
			$data[] = $cat;
			
		}
		$this->response($data);

	}

	
}
?>
