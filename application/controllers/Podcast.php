<?php
require_once('Access.php');
class Podcast extends Access
{
	function __construct()
	{
		parent::__construct('podcast');
		$this->load->library('ios');
		$this->load->library('gcm');

	}

	function index()
	{
		$this->session->unset_userdata('searchterm');
		$pag = $this->config->item('pagination');
		$pag['base_url'] = site_url('podcast/index');
		$pag['total_rows'] = $this->podcast_model->count_all();
		$data['items'] = $this->podcast_model->get_all($pag['per_page'],$this->uri->segment(3));
		$data['pag'] = $pag;
		$content['content'] = $this->load->view('podcast/view',$data,true);
		$this->load->view('template',$content);
	}

	function add()
	{
		$this->check_access('add');
		if ($this->input->server('REQUEST_METHOD')=='POST') {

			$config['upload_path'] = './music/';
			$config['allowed_types'] = 'mp3';
			$config['max_size'] = '10000*100';
			$config['overwrite'] = FALSE;
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('file'))
			{
				$error = array('error' => $this->upload->display_errors());

			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
			}
			$basename = $_FILES['file']['name'];
			move_uploaded_file($_FILES['file']['tmp_name'],$config['upload_path'].$basename);
			$urlfile_uploaded = base_url(). 'music/' . $basename;


			$dataradio = array(

				'track_name' => $this->input->post('title'),
				'track_file'=> $urlfile_uploaded,
				'file' => $basename
			);


			if ($this->podcast_model->save($dataradio)) {
				$this->session->set_flashdata('success','Item is successfully added.');
				$push = $this->input->post('title');
				//$this->sendPush($push);
				redirect('podcast');
			} else {
				$this->session->set_flashdata('error','Database error occured.Please contact your system administrator.');
			}


		}

		$content['content'] = $this->load->view('podcast/add',array(),true);
		$this->load->view('template',$content);
	}

	function sendPush($push)
	{

		foreach( $this->device_model->iostoken()->result()  as $token){

			$this->ios->to($token->token)->badge(3)->message($push)->send();
		}
		
		foreach( $this->device_model->androidtoken()->result()  as $token){

			$this->send_gcm($push,$token->token);
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

	function delete($item_id=0)
	{
		$this->check_access('delete');

		$imgs = $this->podcast_model->get_info($item_id)->file;

		unlink('./music/'.$imgs);


		if ($this->podcast_model->delete($item_id)) {
			$this->session->set_flashdata('success','The item is successfully deleted.');
		} else {
			$this->session->set_flashdata('error','Database error occured.Please contact your system administrator.');
		}
		redirect(site_url('podcast'));
	}

}
?>