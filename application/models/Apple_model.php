<?php
class Apple_model extends Appteve_Model
{
	protected $table_name;

	function __construct()
	{
		parent::__construct();
		$this->table_name = 'apple';
	}

	function count_all()
	{
		$this->db->from($this->table_name);

		return $this->db->count_all_results();
	}

	function get_all($limit=false,$offset=false)
	{


		$this->db->from($this->table_name);

		if ($limit) {
			$this->db->limit($limit);
		}

		if ($offset) {
			$this->db->offset($offset);
		}

		$this->db->order_by('added','desc');
		return $this->db->get();
	}
	function delete($id)
	{
		$this->db->where('id',$id);
		return $this->db->delete($this->table_name);
	}

	function count_all_by($conditions=array())
	{
		$this->db->from($this->table_name);


		if (isset($conditions['searchterm'])) {
			$this->db->like('name_track',$conditions['searchterm']);
		}


		return $this->db->count_all_results();
	}

	function get_all_by($conditions=array(),$limit=false,$offset=false)
	{
		$this->db->from($this->table_name);


		if (isset($conditions['searchterm'])) {
			$this->db->like('name_track',$conditions['searchterm']);
		}


		if ($limit) {
			$this->db->limit($limit);
		}

		if ($offset) {
			$this->db->offset($offset);
		}

		$this->db->order_by('added','desc');
		return $this->db->get();
	}

	function exists($data)
	{
		$this->db->from($this->table_name);

		$this->db->order_by('added','desc');
		$this->db->limit(5);
		$this->db->like('name_track',$data['name_track']);
		$query = $this->db->get();

		return ($query->num_rows()==1);
	}

	function save(&$data,$id=false)
	{
		if ($this->db->insert($this->table_name,$data)) {
			return true;
		} else {
			$this->db->where('id',$id);
			return $this->db->update($this->table_name,$data);
		}

		return $false;
	}
}