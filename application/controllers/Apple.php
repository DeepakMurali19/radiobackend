<?php
require_once('Access.php');
class Apple extends Access
{
	function __construct()
	{
		parent::__construct('apple');

	}

	function index()
	{
		$this->session->unset_userdata('searchterm');

		$pag = $this->config->item('pagination');
		$pag['base_url'] = site_url('apple/index');
		$pag['total_rows'] = $this->apple_model->count_all();
		$data['apples'] = $this->apple_model->get_all($pag['per_page'],$this->uri->segment(3));
		$data['pag'] = $pag;
		$content['content'] = $this->load->view('apple/view',$data,true);
		$this->load->view('template',$content);
	}

	function delete($item_id=0)
	{
		$this->check_access('delete');
		if ($this->apple_model->delete($item_id))
		{
			$this->session->set_flashdata('success','The item is successfully deleted.');

		} else {

			$this->session->set_flashdata('error','Database error occured.Please contact your system administrator.');
		}

		redirect(site_url('apple'));
	}

	function search()
	{
		$search_term = $this->searchterm_handler($this->input->post('searchterm'));
		$pag = $this->config->item('pagination');
		$pag['base_url'] = site_url('apple/search');
		$pag['total_rows'] = $this->apple_model->count_all_by(array('searchterm'=>$search_term));
		$data['searchterm'] = $search_term;
		$data['apples'] = $this->apple_model->get_all_by(array('searchterm'=>$search_term),$pag['per_page'],$this->uri->segment(3));
		$data['pag'] = $pag;
		$content['content'] = $this->load->view('apple/search',$data,true);
		$this->load->view('template',$content);
	}

	function searchterm_handler($searchterm)
	{
		if ($searchterm)
		{
			$this->session->set_userdata('searchterm', $searchterm);
			return $searchterm;

		} elseif ($this->session->userdata('searchterm'))
		{
			$searchterm = $this->session->userdata('searchterm');
			return $searchterm;

		} else {
			$searchterm ="";
			return $searchterm;
		}
	}

}