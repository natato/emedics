<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('./vendor/autoload.php');
use Postmark\PostmarkClient;
class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($i=0)
	{
		if($i==0){
			$this->load->view('login');
		}
		else{
			$this->load->model("User_model");
			$email=$this->input->post("email");
			$password=$this->input->post("password");
			$user=$this->User_model->authenticate($email,md5($password));
			
			if(isset($user)&&$user->activated==1){
				$this->session->set_userdata("user",$user);
				$this->load->model("Facility_model");
				$facility_id=$this->User_model->get_facility($user->userID);
				$this->session->set_userdata("facility_id",$facility_id);
				$facility=$this->Facility_model->getFacility($facility_id);
				$facility_name=$facility->name;
				$var=explode(" ",$facility_name);
				$facility_name=$var[0];
				for($i=1;$i<count($var);$i++){
					$facility_name=$facility_name."-".$var[$i];
				}
				redirect("dashboard/index/".$facility_name);
			}
			else{
				$this->load->view('login');
			}
		}
	}
	public function change_password($i=0,$u=0){
		if($i==0){
			$this->load->view('change_password');
		}
		else if($i==1){
			$email=$this->input->post("email");
			$this->load->model("User_model");
			$user=$this->User_model->getuser($email);
			if($user!=null){
				$date=DATE("Y-m-d H:i:s",strtotime('+24 hours'));
				$this->User_model->updatePasswordExpiry($user->userID,$date);
				$name=$user->Firstname." ".$user->Lastname;
				$productUrl=site_url("login");
				$actionUrl=site_url("login/change_password/2/".$user->userID);
				$client = new PostmarkClient("3c161207-01be-475a-b9c5-860d645c2990");

				// Send an email:
				$sendResult = $client->sendEmailWithTemplate(
				  "info@equicksales.com",
				  $email,
				  21209898,
				  [
				  "product_url" => $productUrl,
				  "product_name" => "Emedics",
				  "name" => $name,
				  "action_url" => $actionUrl,
				  "support_url" => "mailto:support@equicksales.com",
				  "company_name" => "Equicksales Consulting Ltd.",
				  "company_address" => "support@equicksales.com",
				]);
				echo "Password link sent";
			}
			else{
				echo "Wrong email address";
			}
			
		}
		else if($i==2){

			$this->load->view('password_reset',array("user_id"=>$u));
		}
		else if($i==3){
			$password=$this->input->post("password");
			$confirmPassword=$this->input->post("confirmPassword");
			if(!empty($password) && $password==$confirmPassword){
				$this->load->model("User_model");
				$date=DATE("Y-m-d H:i:s");
				$flag=$this->User_model->editpassword($u,md5($password),$date);
				if($flag>0){

					$msg="Password Reset Successfull";
				}
				else{
					$msg="Your password reset request has expired";
				}
				$this->load->view('login',array("msg"=>$msg));
			}
			else{
				$msg="The passwords you entered are not the same";
				$this->load->view('password_reset',array("user_id"=>$u,"msg"=>$msg));
				
			}
		}
		
	}
	public function register($i=0){
		if($i==0){
			$this->load->view('register');
		}
		else{
			$firstname=$this->input->post("firstname");
			$lastname=$this->input->post("lastname");
			$facilityname=$this->input->post("facility");
			$email=$this->input->post("email");
			$password=md5($this->input->post("password"));
			$this->load->model("User_model");
			$user=$this->User_model->getuser($email);
			if($user==null){
				$date=DATE("Y-m-d H:i:s",strtotime('+24 hours'));
				$this->User_model->adduser($email,$password,$firstname,$lastname,"Administrator",$date);
				$user=$this->User_model->getuser($email);
				$this->load->model("Facility_model");
				$facility=$this->Facility_model->getByEmail($email);
				if($facility==null){
					$this->Facility_model->addFacility($facilityname,$email);
					$facility=$this->Facility_model->getByEmail($email);
				}
				$facility_id=$facility->facility_id;
				$this->User_model->link_facility($user->userID,$facility_id);

				$actionUrl=site_url("login/activate/".$user->userID);
				$productUrl=site_url("login");
				$client = new PostmarkClient("3c161207-01be-475a-b9c5-860d645c2990");
				$sendResult = $client->sendEmailWithTemplate(
				  "info@equicksales.com",
				  $email,
				  11656264,
				  [
				  "product_name" => "Emedics",
				  "name" => $firstname,
				  "product_url" => $productUrl,
				  "action_url" => $actionUrl,
				  "username" => $email,
				  "support_email" => "support@equicksales.com",
				  "company_name" => "Equicksales Consulting Ltd.",
				]);
				echo "user added";
			}
			else{
				echo "email already exists";
			}
		}
	}
	public function activate($id){
		$this->load->model("User_model");
		$date=DATE("Y-m-d H:i:s");
		$flag=$this->User_model->activateuser($id,$date);
		if($flag==1){
			echo "Your Account has been Activated Successfully. Enjoy Emedics by Signing in with your Email Address and Password.";
		}
		else{
			echo "Your Activation link has expired.";
		}
	}
	public function logout(){
		$this->session->unset_userdata("user");
		$this->session->unset_userdata("facility");
		redirect('login/index');
	}
}
