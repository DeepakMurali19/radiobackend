<?php 
require_once(APPPATH.'/libraries/REST_Controller.php');

class News extends REST_Controller
{
	
	function get_get()
	{
		$data = null;
		header('Content-type: application/json');
		$cats = $this->news_model->get_all()->result();
		foreach ($cats as $cat)
		{
			$data[] = $cat;
		}
		$this->response($data);

	}
}
?>