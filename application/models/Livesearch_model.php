<?php
class Livesearch_model extends CI_Model
{
	function fetch_data($query)
	{
		$this->db->select('m.*, m.id, m.code code, m.description description, r.code rack, mm.*, md.*,
						   group_concat(DISTINCT concat(md.model) order by md.model SEPARATOR ", ") models');
		$this->db->join('racks r', 'r.id = m.rack_id', 'LEFT OUTER');
		$this->db->join('mold_models mm', 'mm.mold_id = m.id', 'LEFT OUTER');
		$this->db->join('modeltypes md', 'mm.model_id = md.id', 'LEFT OUTER');
		if($query != '')
		{
			$this->db->like('m.code', $query);
			$this->db->or_like('name', $query);
			$this->db->or_like('r.code', $query);
			$this->db->or_like('condition', $query);
			$this->db->or_like('m.description', $query);
			$this->db->or_like('image', $query);
			$this->db->or_like('models', $query);
		}
		$this->db->group_by('m.id');
		$this->db->order_by('m.code');
		return $this->db->get('molds m');
	}

	// function fetch_data($query)
	// {
	// 	$this->db->select("*");
	// 	$this->db->from("tbl_customer");
	// 	if($query != '')
	// 	{
	// 		$this->db->like('CustomerName', $query);
	// 		$this->db->or_like('Address', $query);
	// 		$this->db->or_like('City', $query);
	// 		$this->db->or_like('PostalCode', $query);
	// 		$this->db->or_like('Country', $query);
	// 	}
	// 	$this->db->order_by('CustomerID', 'DESC');
	// 	return $this->db->get();
	// }
}
?>



