<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Klub_MOdel extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}	

		public function getDataKlub()
		{
			$this->db->select("id,nama,logo");
			$query = $this->db->get('klub');
			return $query->result();
		}

		public function getPemainByKlub($idKlub)
		{
			$this->db->select("pemain.nama as namaPemain, posisi,DATE_FORMAT(tanggal_lahir,'%d-%m-%Y') as tanggal_lahir");
			$this->db->where('fk_klub', $idKlub);	
			$this->db->join('klub', 'klub.id = pemain.fk_klub', 'left');	
			$query = $this->db->get('pemain');
			return $query->result();

			
		}           
                                    
		public function insertKlub()
		{
			$object = array(
				'nama' => $this->input->post('nama'),'logo' => $this->upload->data('file_name'),
				);
			$this->db->insert('klub',$object); 
		}

			public function insertPemain($id)
		{
			$object = array(
				'nama' =>$this->input->post('nama') ,
				'id' =>$this->input->post('id') ,
				'tanggal_lahir' =>$this->input->post('tanggal_lahir') ,
				'fk_klub' => $id 
				);
			$this->db->insert('pemain',$object); 
		}

		public function getKlub($id)
		{
			$this->db->where('id', $id);	
			$query = $this->db->get('klub',1);
			return $query->result();

		}

			public function getPemain($id)
		{
			$this->db->where('id', $id);	
			$query = $this->db->get('pemain',1);
			return $query->result();

		}
		public function updateById($id)
		{
			$data = array(
				'nama' => $this->input->post('nama'),
				 );
			$this->db->where('id', $id);
			$this->db->update('klub', $data);
		}

		public function deleteById($id) 
		{
			$this->db->where('id',$id);
			$this->db->delete('klub');
		}


}
	

/* End of file Categori_Model.php */
/* Location: ./application/models/Categori_Model.php */
?>