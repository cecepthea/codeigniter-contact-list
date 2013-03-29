<?php 
class Category_model extends CI_Model {

	private $table = "categories";
	
	function get_options( $options = array() ) {
		$query = $this->db->get($this->table);
		foreach ($query->result() as $row) {
			$options[$row->category_id] = $row->category;
		}
		
		return $options;
	}

}
