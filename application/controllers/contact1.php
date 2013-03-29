<?php
class Contact extends CI_Controller {

	private $limit = 10;
	
	function index($offset = 0) {
		$this->load->model("contact_model", "contact");
		$this->load->model("category_model", "category");

		$param['offset'] = $offset;
		$param['selected'] = $this->input->post('category_id');
		$param['options'] = $this->category->get_options( array("" => "Semua Kategori") );		
		$param["data"] = $this->contact->get_all($this->limit, $offset);
		$this->load->view("contact_html", $param);
	}

}
