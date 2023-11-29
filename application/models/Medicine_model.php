<?php
class Medicine_model extends CI_Model{
	public function __construct(){
	}
	public function add($disease_id,$name,$description,$created_at){
		$data=array(
			"disease_id"=>$disease_id,
			"name"=>$name,
			"description"=>$description,
			"created_at"=>$created_at

		);
		$this->db->insert("medicine",$data);
	}
	public function edit($id,$name,$disease_id,$description,$updated_at){
			$data=array(
			"disease_id"=>$disease_id,	
			"name"=>$name,
			"description"=>$description,
			"updated_at"=>$updated_at

		);
		$this->db->update("medicine",$data);
		$this->db->where("id",$id);
	}
	public function get($id){
		$this->db->select("id,disease_id,name,description,created_at,updated_at");
		$this->db->from("medicine");
		$this->db->where("id",$id);
		$this->db->order_by("created_at","desc");
		return $this->db->get();
	}
	public function getAll(){
		$this->db->select("id,disease_id,name,description,created_at,updated_at");
		$this->db->from("medicine");
		$this->db->order_by("created_at","desc");
		return $this->db->get();
	}
	public function getByDiseaseId($disease_id){
		$this->db->select("id,disease_id,name,description,created_at,updated_at");
		$this->db->from("medicine");
		$this->db->where("disease_id",$disease_id);
		$this->db->order_by("created_at","desc");
		return $this->db->get();	
	}
	
}

?>