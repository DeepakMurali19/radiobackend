<?php 
require_once(APPPATH.'/libraries/REST_Controller.php');

class Trend extends REST_Controller
{
	
	function radio_post()
	{

		$data = $this->post();
		
		if ($data == null)
		{
			$this->response(array('error' => array('message' => 'invalid_json')));
		}
		
		if (!array_key_exists('radio_id', $data))
		{
			$this->response(array('error' => array('message' => 'require_radio_id')));
		}
		
		$tr_data = array(
			'radio_id' => $data['radio_id'],
			'count' =>  1
		);
		
		if ($this->trend_model->exists($tr_data))
		{
			$radioold = $this->trend_model->getby_radioid($tr_data)->result();
			$newcount = intval($radioold[0]->count) + 1;
			
			$newdata = array(
				'radio_id' => $data['radio_id'],
				'count' =>  $newcount
			);
			
			$this->trend_model->plustrend($newdata, $radioold[0]->id);
			$this->response(array('error' => array('message' => 'plus on trend')));
			
		} else {
			
			$this->trend_model->save($tr_data);
			$this->response(array('success'=>'make new trend'));
		}


	}
	
	function all_get()
	{
		$data = null;
		header('Content-type: application/json');
		$cats = $this->trend_model->dataall()->result();
		
		foreach ($cats as $cat)
		{
			
			$radioz = $this->radio_model->get_info($cat->radio_id);
			$data[] = ['trend'=>$cat, 'radio'=>$radioz];
			
		}
		
		$this->response($data);
	}
	
}
?>