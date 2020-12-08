<?php 
require_once(APPPATH.'/libraries/REST_Controller.php');
class Apple extends REST_Controller
{
	function get_get()
	{
		$data = null;

		header('Content-type: application/json');
		$cats = $this->apple_model->get_all()->result();
		
		foreach ($cats as $cat)
		{
			$data[] = $cat;
		}
		
		$this->response($data);



	}

	function music_post()
	{
		$data = $this->post();
		
		if ($data == null)
		{
			$this->response(array('error' => array('message' => 'invalid_json')));
		}
		
		if (!array_key_exists('name_track', $data))
		{
			$this->response(array('error' => array('message' => 'require_track_name')));
		}
			
		if (!array_key_exists('cover_url', $data))
		{
			$this->response(array('error' => array('message' => 'require_cover_url')));
		}
		
		if (!array_key_exists('name_radio', $data))
		{
			$this->response(array('error' => array('message' => 'require_name_radio')));
		}

		if (!array_key_exists('track_url', $data))
		{
			$this->response(array('error' => array('message' => 'require_track_url')));
		}
		if (!array_key_exists('is_found', $data))
		{
			$this->response(array('error' => array('message' => 'require_is_found')));
		}
		
		$apple_data = array(
			'name_track' => $data['name_track'],
			'cover_url' => $data['cover_url'],
			'name_radio' => $data['name_radio'],
			'track_url' => $data['track_url'],
			'is_found' => $data['is_found']
		);
		
		if ($this->apple_model->exists($apple_data))
		{
			$this->response(array('error' => array('message' => 'track_do_in_database')));
			
		} else {
			
			$this->apple_model->save($apple_data);
			$this->response(array('success'=>'Track is saved successfully!'));
		}
	}
}
?>