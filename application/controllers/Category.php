<?php

require_once('Access.php');
class Category extends Access
{

	function __construct()
	{
		parent::__construct('category');
	}

	function index()
	{
		$this->session->unset_userdata('searchterm');
		$pag = $this->config->item('pagination');
		$pag['base_url'] = site_url('category/index');
		$pag['total_rows'] = $this->category_model->count_all();
		$data['categories'] = $this->category_model->get_all($pag['per_page'],$this->uri->segment(3));
		$data['pag'] = $pag;
		$content['content'] = $this->load->view('category/view',$data,true);
		$this->load->view('template',$content);
	}

	function add()
	{
		$this->check_access('add');

		if ($this->input->server('REQUEST_METHOD')=='POST') {

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '1000*10';
			$config['max_width']  = '1024';
			$config['max_height']  = '1024';
			$config['overwrite'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('file')) //not working
				{
				$error = array('error' => $this->upload->display_errors());
				var_dump($error);
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
			}
			$basename = $_FILES['file']['name'];

			move_uploaded_file($_FILES['file']['tmp_name'],$config['upload_path'].$basename);
			$urlfile_uploaded = base_url(). 'uploads/' . $basename;

			$category_data = array(
				'name' => $this->input->post('name'),
				'url_covercat' => $basename

			);

			if ($this->category_model->save($category_data)) {
				$this->session->set_flashdata('success','Category is successfully added.');
				redirect('category');
			} else {
				$this->session->set_flashdata('error','Database error occured.Please contact your system administrator.');
			}
		}

		$content['content'] = $this->load->view('category/add',array(),true);
		$this->load->view('template',$content);
	}

	function exists($category_id=null)
	{
		$name = $_REQUEST['name'];

		if (strtolower($this->category_model->get_info($category_id)->name) == strtolower($name)) {
			echo "true";
		} else if ($this->category_model->exists(array('name'=>$_REQUEST['name']))) {
				echo "false";
			} else {
			echo "true";
		}
	}

	function delete($category_id=0)
	{
		$this->check_access('delete');
		if($this->category_model->delete($category_id)) {
			$this->session->set_flashdata('success','The category is successfully deleted.');
		} else {
			$this->session->set_flashdata('error','Database error occured.Please contact your system administrator.');
		}
		redirect(site_url('category'));
	}


	function delete_items($category_id=0)
	{
		$this->check_access('delete');

		if ($this->category_model->delete($category_id)) {
			if ($this->radio_model->delete_by_cat($category_id)) {
				$this->session->set_flashdata('success','The category is successfully deleted.');
			} else {
				$this->session->set_flashdata('error','Database error occured in items.Please contact your system administrator.');
			}
		} else {
			$this->session->set_flashdata('error','Database error occured in categories.Please contact your system administrator.');
		}
		redirect(site_url('category'));
	}

	function edit($category_id=0)
	{
		$this->check_access('edit');



		if ($this->input->server('REQUEST_METHOD')=='POST') {

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '1000*10';
			$config['max_width']  = '1024';
			$config['max_height']  = '1024';
			$config['overwrite'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('file'))
			{
			//	$error = array('error' => $this->upload->display_errors());
			//	var_dump($error);

				$basename =  $this->session->userdata('image');
				$urlfile_uploaded = base_url(). 'uploads/' . $basename;
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
			}
			if(file_exists($_FILES['file']['tmp_name'])){

				$basename = $_FILES['file']['name'];
			    $urlfile_uploaded = base_url(). 'uploads/' . $basename;

			} else{


			}

		//	$basename = $_FILES['file']['name'];
			move_uploaded_file($_FILES['file']['tmp_name'],$config['upload_path'].$basename);
		//	$urlfile_uploaded = base_url(). 'uploads/' . $basename;

			$category_data = array(
				'name' => $this->input->post('name'),
				'url_covercat' => $basename
				
			);

			if($this->category_model->save($category_data,$category_id)) {
				$this->session->set_flashdata('success','Category is successfully updated.');
			} else {
				$this->session->set_flashdata('error','Database error occured.Please contact your system administrator.');
			}
			redirect(site_url('category'));
		}

		$data['category'] = $this->category_model->get_info($category_id);

		$content['content'] = $this->load->view('category/edit',$data,true);
		$this->load->view('template',$content);
	}

	function search()
	{
		$search_term = $this->searchterm_handler($this->input->post('searchterm'));
		$pag = $this->config->item('pagination');
		$pag['base_url'] = site_url('category/search');
		$pag['total_rows'] = $this->category_model->count_all_by(array('searchterm'=>$search_term));
		$data['searchterm'] = $search_term;
		$data['categories'] = $this->category_model->get_all_by(array('searchterm'=>$search_term),$pag['per_page'],$this->uri->segment(3));
		$data['pag'] = $pag;
		$content['content'] = $this->load->view('category/search',$data,true);
		$this->load->view('template',$content);
	}

	function searchterm_handler($searchterm)
	{
		if ($searchterm) {
			$this->session->set_userdata('searchterm', $searchterm);
			return $searchterm;
		} elseif ($this->session->userdata('searchterm')) {
			$searchterm = $this->session->userdata('searchterm');
			return $searchterm;
		} else {
			$searchterm ="";
			return $searchterm;
		}
	}


}
?>
