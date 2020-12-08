<?php
class Trend_model extends Appteve_Model
{

	protected $table_name;

	function __construct()
	{
		parent::__construct();
		$this->table_name = 'trend';

	}

	function exists($data)
	{
		$this->db->from($this->table_name);
		$this->db->like('radio_id',$data['radio_id']);
		$query = $this->db->get();
		return ($query->num_rows()==1);
	}

	function getby_radioid($data){

		$this->db->from($this->table_name);
		$this->db->like('radio_id',$data['radio_id']);
		return $result =  $this->db->get();
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

	function plustrend($data, $id=false){

		$this->db->where('id',$id);
		return $this->db->update($this->table_name,$data);

	}

	function dataall(){

		$this->db->from($this->table_name);
		$this->db->order_by("count","desc");
		return $this->db->get();
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

		return $this->db->get();
	}

}
?>