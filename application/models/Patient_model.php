<?php
class Patient_model extends CI_Model{
	public function __construct(){
	}
	public function getNoOfPatients($facility_id){
		$this->db->select("patient.patientID");
		$this->db->from("patient");
		$this->db->join("patient_facility_link","patient.patientID=patient_facility_link.patient_id");
		$this->db->where("patient_facility_link.facility_id",$facility_id);
		$patients=$this->db->get();
		return $patients->num_rows();
	}
	
	public function getPatient($patient_id){
		$this->db->select("patientID,name,date_of_birth,Town,date_of_first_visit,phone_number");
		$this->db->from("patient");
		$this->db->where("patientID",$patient_id);
		$patient=$this->db->get();
		return $patient->row();
	}
	public function getFacilityPatients($facility_id){
		$this->db->select("patient.patientID,patient.name,patient.date_of_birth,patient.Town,patient.date_of_first_visit,patient.phone_number");
		$this->db->from("patient");
		$this->db->join("patient_facility_link","patient.patientID=patient_facility_link.patient_id");
		$this->db->join("medical_facility","patient_facility_link.facility_id=medical_facility.facility_id");
		$this->db->where("patient_facility_link.facility_id",$facility_id);
		return $this->db->get();
	}
	public function addPatient($patientid,$name,$town,$dob,$dofv,$phone){
		$data=array(
			"patientID"=>$patientid,
			"name"=>$name,
			"Town"=>$town,
			"date_of_birth"=>$dob,
			"date_of_first_visit"=>$dofv,
			"phone_number"=>$phone
		);
		$this->db->insert("patient",$data);
	}
	public function link_facility($patient_id,$facility_id){
		$data=array(
			"patient_id"=>$patient_id,
			"facility_id"=>$facility_id,
		);
		$this->db->insert("patient_facility_link",$data);
	}
	public function updatePatient($patientid,$name,$town,$dob,$dofv,$phone){
		$data=array(
			"name"=>$name,
			"Town"=>$town,
			"date_of_birth"=>$dob,
			"date_of_first_visit"=>$dofv,
			"phone_number"=>$phone
		);
		$this->db->where("patientID",$patientid);
		$this->db->update("patient",$data);

	}
	public function deletePatient($patientid){
		$this->db->where("patientID",$patientid);
		$this->db->delete("patient");
	}
}

?>