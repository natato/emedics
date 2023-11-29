<?php
class Facility_model extends CI_Model{
	public function __construct(){
	}
	public function getFacility($id){
		$this->db->select("facility_id,name,email,town,country");
		$this->db->from("medical_facility");
		$this->db->where("facility_id",$id);
		$facility=$this->db->get();
		return $facility->row();
	}
	public function getByEmail($email){
		$this->db->select("facility_id,name,email,town,country");
		$this->db->from("medical_facility");
		$this->db->where("email",$email);
		$facility=$this->db->get();
		return $facility->row();
	}
	public function addFacility($facilityname,$email){
		$data=array(
			"name"=>$facilityname,
			"email"=>$email
		);
		$this->db->insert("medical_facility",$data);
	}
	
}

?>