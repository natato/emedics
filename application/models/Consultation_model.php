<?php
class Consultation_model extends CI_Model{
	public function __construct(){
	}
	public function add($doctor_id,$patient_id,$created_at){
		$data=array(
			"doctor_user_id"=>$doctor_id,
			"patient_id"=>$patient_id,
			"created_at"=>$created_at

		);
		$this->db->insert("consultation",$data);
	}
	public function edit($id,$doctor_id,$patient_id,$created_at,$updated_at){
		$data=array(
			"doctor_user_id"=>$doctor_id,	
			"patient_id"=>$patient_id,	
			"updated_at"=>$updated_at

		);
		$this->db->update("consultation",$data);
		$this->db->where("id",$id);
	}
	public function get($id){
		$this->db->select("id,doctor_user_id,patient_id,created_at,updated_at");
		$this->db->from("consultation");
		$this->db->where("id",$id);
		$this->db->orderby("created_at","desc");
		return $this->db->get();
	}
	public function getByPatientId($patient_id){
		$this->db->select("id,doctor_user_id,patient_id,created_at,updated_at");
		$this->db->from("consultation");
		$this->db->where("patient_id",$patient_id);
		$this->db->orderby("created_at","desc");
		return $this->db->get();	
	}
	
}

?>