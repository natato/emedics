<?php
class User_model extends CI_Model{
	public function __construct(){
	}
	public function updatePasswordExpiry($user_id,$date){
		$data=array(
			"passwordResetExpiry"=>$date,
		);
		$this->db->where("userID",$user_id);
		$this->db->update("user",$data);
	}

	public function getNoOfUsers($facility_id){
		$this->db->select("user.userID");
		$this->db->from("user");
		$this->db->join("user_facility_link","user.userID=user_facility_link.user_id");
		$this->db->where("user_facility_link.facility_id",$facility_id);
		$users=$this->db->get();
		return $users->num_rows();
	}
	public function authenticate($email,$password){
		$this->db->select("userID,Firstname,Lastname,password,userType,activated,extra_roles");
		$this->db->from("user");
		$this->db->where("emailAddress",$email);
		$this->db->where("password",$password);
		$user=$this->db->get();
		return $user->row();
	}
	public function getuser($email){
		$this->db->select("userID,Firstname,Lastname,password,userType,activated,extra_roles");
		$this->db->from("user");
		$this->db->where("emailAddress",$email);
		$user=$this->db->get();
		return $user->row();
	}
	public function getuserbyid($id){
		$this->db->select("userID,Firstname,Lastname,emailAddress,password,userType,activated,extra_roles");
		$this->db->from("user");
		$this->db->where("userID",$id);
		$user=$this->db->get();
		return $user->row();
	}
	public function getusers(){
		$this->db->select("userID,Firstname,Lastname,emailAddress,userType,activated,extra_roles");
		$this->db->from("user");
		return $this->db->get();
	}
	public function getFacilityUsers($facility_id){
		$this->db->select("user.userID,user.Firstname,user.Lastname,user.emailAddress,user.userType,user.activated,user.extra_roles");
		$this->db->from("user");
		$this->db->join("user_facility_link","user_facility_link.user_id=user.userID");
		$this->db->join("medical_facility","user_facility_link.facility_id=medical_facility.facility_id");
		$this->db->where("user_facility_link.facility_id",$facility_id);
		return $this->db->get();
	}
	public function editpassword($id,$newpassword,$date){
		$data=array(
			"password"=>$newpassword,
			"passwordResetExpiry"=>$date
		);
		$this->db->where("userID",$id);
		$this->db->where("passwordResetExpiry>=",$date);
		$this->db->update("user",$data);
		return $this->db->affected_rows();
	}
	public function activateuser($id,$date){
		$data=array(
			"activated"=>1,
		);
		$this->db->where("userID",$id);
		$this->db->where("activationExpiry>=",$date);
		$this->db->update("user",$data);
		return $this->db->affected_rows();
	}
	public function adduser($email,$password,$firstname,$lastname,$usertype,$date){
		
		
		$data=array(
			"emailAddress"=>$email,
			"password"=>$password,
			"Firstname"=>$firstname,
			"Lastname"=>$lastname,
			"activated"=>0,
			"usertype"=>$usertype,
			"activationExpiry"=>$date
		);
		$this->db->insert("user",$data);
	}
	public function editname($id,$firstname,$lastname){
		$data=array(
			"Firstname"=>$firstname,
			"Lastname"=>$lastname
		);
		$this->db->where("userID",$id);
		$this->db->update("user",$data);
		
	}
	public function editroles($id,$role,$extra_roles){
		$data=array(
			"userType"=>$role,
			"extra_roles"=>$extra_roles
		);
		$this->db->where("userID",$id);
		$this->db->update("user",$data);
	}
	public function editemailaddress($id,$emailaddress){
		$data=array(
			"emailAddress"=>$emailaddress
		);
		$this->db->where("userID",$id);
		$this->db->update("user",$data);
	}
	public function editactivated($id,$activated){
		$data=array(
			"activated"=>$activated
		);
		$this->db->where("userID",$id);
		$this->db->update("user",$data);
	}
	public function link_facility($user_id,$facility_id){
		$data=array(
			"user_id"=>$user_id,
			"facility_id"=>$facility_id
		);
		$this->db->insert("user_facility_link",$data);
	}
	public function get_facility($user_id){
		$this->db->select("facility_id");
		$this->db->from("user_facility_link");
		$this->db->where("user_id",$user_id);
		$info=$this->db->get();
		$row=$info->row();
		return $row->facility_id;
	}
}

?>