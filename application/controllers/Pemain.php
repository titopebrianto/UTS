<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemain extends CI_Controller {

	public function index($idKlub)
	{
		$this->load->model('klub_model');		
		$data["pemain_list"] = $this->klub_model->getPemainByKlub($idKlub);
		$this->load->view('pemain', $data);
	}

public function create($idKlub)
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama','Nama', 'trim|required');
		$this->load->model('klub_model');	

		if($this->form_validation->run()==FALSE){

			$this->load->view('tambah_barang_view');

		}else
			{
			$this->klub_model->insertPemain($idKlub);
			$this->load->view('tambah_barang_sukses');
			}
		}
	}

/* End of file Jabatan.php */
/* Location: ./application/controllers/Jabatan.php */

 ?>
