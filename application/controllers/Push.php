<?php
require_once('Access.php');
class Push extends Access
{
	function __construct()
	{
		parent::__construct('push');
		$this->load->library('ios');
		$this->load->library('gcm');

	}

	function index()
	{

		$this->session->unset_userdata('searchterm');
		$this->session->unset_userdata('cat_id');

		$pag = $this->config->item('pagination');
		$pag['base_url'] = site_url('push/index');
		$pag['total_rows'] = $this->push_model->count_all();
		$data['items'] = $this->push_model->get_all($pag['per_page'],$this->uri->segment(3));
		$data['pag'] = $pag;
		$content['content'] = $this->load->view('push/view',$data,true);
		$this->load->view('template',$content);

	}

	function add()
	{
		$this->check_access('add');


		if ($this->input->server('REQUEST_METHOD')=='POST') {

			$push = $this->input->post('pushtext');
			$this->sendPush($push);

			$dataradio = array(

				'textpush' => $this->input->post('pushtext')

			);


			if ($this->push_model->save($dataradio)) {
				$this->session->set_flashdata('success','Push is successfully sended .');
				redirect('push');
			} else {
				$this->session->set_flashdata('error','Database error occured.Please contact your system administrator.');
			}


		}

		$content['content'] = $this->load->view('push/add',array(),true);
		$this->load->view('template',$content);
	}

	function sendPush($push)
	{

		foreach( $this->device_model->iostoken()->result()  as $token){

			$this->ios->to($token->token)->badge(3)->message($push)->send();
		}
		
		foreach( $this->device_model->androidtoken()->result()  as $tokens){

			$this->send_gcm($push,$tokens->token);
		}


	}
	
	function send_gcm($message,$token)
    {
    
        $this->gcm->setMessage($message);

        $this->gcm->addRecepient($token);

        $this->gcm->setTtl(500);
    
        $this->gcm->setGroup(false);

        if ($this->gcm->send()){

        }else{
	        
    }
         
         
}

}
?>