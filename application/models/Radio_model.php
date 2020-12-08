<?php
class Radio_model extends Appteve_Model
{
	protected $table_name;

	function __construct()
	{
		parent::__construct();
		$this->table_name = 'radio';
	}

	function exists($data)
	{
		$this->db->from($this->table_name);

		if (isset($data['id'])) {
			$this->db->where('id',$data['id']);
		}

		if (isset($data['cat_id'])) {
			$this->db->where('cat_id',$data['cat_id']);
		}

		if (isset($data['name'])) {
			$this->db->where('name',$data['name']);
		}

		$query = $this->db->get();
		return ($query->num_rows()==1);
	}

	function save(&$data,$id=false)
	{
		if (!$id && !$this->exists(array('id'=>$id))) {
			if ($this->db->insert($this->table_name,$data)) {
				$data['id'] = $this->db->insert_id();
				return true;
			}
		} else {
			$this->db->where('id',$id);
			return $this->db->update($this->table_name,$data);
		}
		return false;
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

	function get_all_by_cat($cat_id, $keyword=false, $limit = false, $offset = false)
	{
		$this->db->from($this->table_name);
		$this->db->where('cat_id',$cat_id);


		if ($limit) {
			$this->db->limit($limit);
		}

		if ($offset) {
			$this->db->offset($offset);
		}

		$this->db->order_by('added','desc');
		return $this->db->get();
	}

	function get_info($id)
	{
		$query = $this->db->get_where($this->table_name,array('id'=>$id));

		if ($query->num_rows()==1) {
			return $query->row();
		} else {
			return $this->get_empty_object($this->table_name);
		}
	}

	function get_multiple_info($ids)
	{
		$this->db->from($this->table_name);
		$this->db->where_in($ids);
		return $this->db->get();
	}

	function count_all()
	{
		$this->db->from($this->table_name);

		return $this->db->count_all_results();
	}

	function count_all_by($conditions=array())
	{
		$this->db->from($this->table_name);

		if (isset($conditions['cat_id'])) {
			$this->db->where('cat_id',$conditions['cat_id']);
		}

		if (isset($conditions['searchterm']) && trim($conditions['searchterm']) != "") {
			$this->db->where("( name LIKE '%".$conditions['searchterm']."%')", NULL, FALSE);
		}

		return $this->db->count_all_results();
	}

	function get_all_by($conditions=array(),$limit=false,$offset=false)
	{
		$this->db->from($this->table_name);

		if (isset($conditions['cat_id'])) {
			$this->db->where('cat_id',$conditions['cat_id']);
		}

		if (isset($conditions['searchterm']) && trim($conditions['searchterm']) != "") {
			$this->db->where("(name LIKE '%".$conditions['searchterm']."%')", NULL, FALSE);
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

	function delete($id)
	{
		$this->db->where('id',$id);
		return $this->db->delete($this->table_name);
	}

	function delete_by_cat($cat_id)
	{
		$this->db->where('cat_id',$cat_id);
		return $this->db->delete($this->table_name);
	}

	function get_popular_items($limit=false, $offset=false)
	{
		$filter = "";
		if ($limit && $offset) {
			$filter = "limit $limit offset $offset";
		} else if ($limit){
				$filter = "limit $limit";
			}

		$sql = "
			SELECT count( appuser_id ) as cnt, item_id
			FROM `ct_likes`
			GROUP BY item_id
			Order By cnt desc
			$filter
		";

		$query = $this->db->query($sql);
		return $query;
	}
}
?>