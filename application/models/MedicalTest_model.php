<?php
class MedicalTest_model extends CI_Model{
	public function __construct(){
	}
	public function add($disease_id,$name,$description,$created_at){
		$data=array(
			"disease_id"=>$disease_id,
			"name"=>$name,
			"description"=>$description,
			"created_at"=>$created_at

		);
		$this->db->insert("medical_test",$data);
	}
	public function edit($id,$name,$disease_id,$description,$updated_at){
			$data=array(
			"disease_id"=>$disease_id,	
			"name"=>$name,
			"description"=>$description,
			"updated_at"=>$updated_at

		);
		$this->db->update("medical_test",$data);
		$this->db->where("id",$id);
	}
	public function get($id){
		$this->db->select("id,disease_id,name,description,created_at,updated_at");
		$this->db->from("medical_test");
		$this->db->where("id",$id);
		$this->db->orderby("created_at","desc");
		return $this->db->get();
	}
	public function getByDiseaseId($disease_id){
		$this->db->select("id,disease_id,name,description,created_at,updated_at");
		$this->db->from("medical_test");
		$this->db->where("disease_id",$disease_id);
		$this->db->orderby("created_at","desc");
		return $this->db->get();	
	}
	
}

?>