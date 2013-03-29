<?php 
class Contact_model extends CI_Model {

	private $table = "contacts";
	
	function get_all($limit, $offset = 0) {
		$category_id = $this->input->post('category_id');
		
		$rs['total_rows'] = $this->db->query("SELECT COUNT(*) total_rows FROM {$this->table}")->row()->total_rows;		
		
		if ($category_id) {
			$this->db->where("category_id", $category_id);
		}
		$rs['query'] = $this->db->limit($limit, $offset)->get($this->table);

		return $rs;
	}
	
	function get_one($id) {
		return $this->db->where("contact_id", $id)->get($this->table)->row_array();
	}
	
	function save($id = false) {
		foreach($_POST as $key => $val) {
			$data[$key] = $this->input->post($key);
		}
		
		if ($id) {
			$this->db->where("contact_id", $id);
			$this->db->update($this->table, $data);
			return $this->db->affected_rows();
		} else {
			$this->db->insert($this->table, $data);
			return $this->db->last_id();
		}
	}
	
	function delete($id) {
		$this->db->where("contact_id", $id);
		$this->db->delete($this->table);
		
		if ( $this->db->affected_rows() ) {
			return true;
		}
		return false;
	}

}
