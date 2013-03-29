<?php
class Contact extends CI_Controller {

	private $limit = 10;
	
	function index($offset = 0) {
		$this->load->model("contact_model", "contact");
		$this->load->model("category_model", "category");
		$this->load->library("pagination");
		
		$param['offset'] = $offset;
		$param['selected'] = $this->input->post('category_id');
		$param['options'] = $this->category->get_options( array("" => "Semua Kategori") );		
		$param["data"] = $this->contact->get_all($this->limit, $offset);
		
		$config["base_url"] = site_url("contact/index");
		$config["total_rows"] = $param["data"]["total_rows"];
		$config["per_page"] = $this->limit;
		$this->pagination->initialize($config);
		
		$this->load->view("contact_table", $param);
	}
	
	function add() {
		$this->load->library("form_validation");
		$this->form_validation->set_rules("name", "Nama", "required|trim");
		$this->form_validation->set_rules("email", "Email", "required|valid_email");
		$this->form_validation->set_rules("phone", "Telpon/Hp", "trim");
		$this->form_validation->set_rules("address", "Alamat", "trim");
		$this->form_validation->set_rules("category_id", "Kategori", "required");
		
		if ($this->form_validation->run()) {
			$this->load->model("contact_model", "contact");
			$is_success = $this->contact->save();		
			
			if ($is_success) {
				$this->session->set_flashdata("message", "Data berhasil disimpan !");				
			} else {
				$this->session->set_flashdata("message", "Maaf, data tidak dapat disimpan !");				
			}
			
			redirect("contact");
		}
		else {			
			$this->load->model("category_model", "category");
			$param['selected'] = $this->input->post('category_id');
			$param['options'] = $this->category->get_options( array("" => "Pilih Kategori") );		
			$this->load->view("contact_form", $param);
		}
	}
	
	function edit($id) {
		$this->load->library("form_validation");
		$this->form_validation->set_rules("name", "Nama", "required|trim");
		$this->form_validation->set_rules("email", "Email", "required|valid_email");
		$this->form_validation->set_rules("phone", "Telpon/Hp", "trim");
		$this->form_validation->set_rules("address", "Alamat", "trim");
		$this->form_validation->set_rules("category_id", "Kategori", "required");
		
		if ($this->form_validation->run()) {
			$this->load->model("contact_model", "contact");
			$is_success = $this->contact->save($id);		
			
			if ($is_success) {
				$this->session->set_flashdata("message", "Data berhasil diupdate !");				
			} else {
				$this->session->set_flashdata("message", "Maaf, data tidak dapat diupdate !");				
			}
			
			redirect("contact");
		}
		else {			
			$this->load->model("category_model", "category");
			$this->load->model("contact_model", "contact");
			
			$param["found"] = $this->contact->get_one($id);
			$param['selected'] = $this->input->post('category_id');
			$param['options'] = $this->category->get_options( array("" => "Pilih Kategori") );		
			$this->load->view("contact_form", $param);
		}
	}
	
	function delete($id) {
		$this->load->model("contact_model", "contact");
		$is_success = $this->contact->delete($id);		
		
		if ($is_success) {
			$this->session->set_flashdata("message", "Data berhasil dihapus !");				
		} else {
			$this->session->set_flashdata("message", "Maaf, data tidak dapat dihapus !");				
		}
		
		redirect("contact");
	}

}
