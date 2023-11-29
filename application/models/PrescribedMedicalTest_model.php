<?php
class PrescribedMedicalTest_model extends CI_Model{
	public function __construct(){
	}
	public function add($patient_id,$name,$description,$created_at){
		$data=array(
			"patient_id"=>$patient_id,
			"name"=>$name,
			"description"=>$description,
			"created_at"=>$created_at

		);
		$this->db->insert("prescribed_medical_test",$data);
	}
	public function edit($id,$name,$patient_id,$description,$updated_at){
			$data=array(
			"patient_id"=>$patient_id,	
			"name"=>$name,
			"description"=>$description,
			"updated_at"=>$updated_at

		);
		$this->db->update("prescribed_medical_test",$data);
		$this->db->where("id",$id);
	}
	public function get($id){
		$this->db->select("id,patient_id,name,description,created_at,updated_at");
		$this->db->from("prescribed_medical_test");
		$this->db->where("id",$id);
		$this->db->orderby("created_at","desc");
		return $this->db->get();
	}
	public function getByPatientId($patient_id){
		$this->db->select("id,patient_id,name,description,created_at,updated_at");
		$this->db->from("prescribed_medical_test");
		$this->db->where("patient_id",$patient_id);
		$this->db->orderby("created_at","desc");
		return $this->db->get();	
	}
	
}

?>