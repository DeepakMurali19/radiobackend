<?php
class Device_model extends Appteve_Model
{
	protected $table_name;

	function __construct()
	{
		parent::__construct();
		$this->table_name = 'device';
	}

	function exists($data)
	{
		$this->db->from($this->table_name);
		$this->db->like('token',$data['token']);
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

	function iostoken ()
	{

		$this->db->from($this->table_name);
		$this->db->where('system', 'ios');
		return $this->db->get();
	}
	
	function androidtoken()
	{
		
		$this->db->from($this->table_name);
		$this->db->where('system', 'android');
		return $this->db->get();
		
	}

	function checktoken($token){

		$this->db->from($this->table_name);
		$this->db->like('token',$token);
		$query = $this->db->get();
		return ($query->num_rows()==1);

	}


}
?>