<!DOCTYPE html>
<html>
	<head>
		<title> Register </title>
	 	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	 	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	  <!-- Custom styles for this template-->
	 	 <link href="<?php echo base_url('css/bootstrap2.css');?>" rel="stylesheet">
	 	 <style>
			.poper{
				z-index:2;
				bottom:100px;
				left:0;
				position:fixed;

			}
		</style>
		<script src="<?php echo base_url('vendor/jquery/jquery.min.js');?>"></script>
		<script src="<?php echo base_url('js/notify.js');?>"></script>
 	</head>
	<body class="bg-gradient-info">

	  <div class="container">

	    <div class="card o-hidden border-0 shadow-lg my-5">
	      <div class="card-body p-0">
	        <!-- Nested Row within Card Body -->
	        <div class="row">
	          <div class="col-lg-8 offset-2">
	            <div class="p-5">
	              <div class="text-center">
	                <h1 class="h4 text-gray-900 mb-4">Create Emedics Account!</h1>
	              </div>
	              <form class="user" method="post" action="">
	                <div class="form-group row">
	                  <div class="col-sm-6 mb-3 mb-sm-0">
	                    <input type="text" class="form-control form-control-user" id="firstname" placeholder="First Name">
	                  </div>
	                  <div class="col-sm-6">
	                    <input type="text" class="form-control form-control-user" id="lastname" placeholder="Last Name">
	                  </div>
	                </div>
	                <div class="form-group">
	                  <input type="text" class="form-control form-control-user" id="facility" placeholder="Medical Facility Name">
	                </div>
	                <div class="form-group row">
	                  <div class="col-sm-6 mb-3 mb-sm-0">
	                    <input type="email" class="form-control form-control-user" id="email" placeholder="Email Address">
	                  </div>
	                  <div class="col-sm-6">
	                    <input type="password" class="form-control form-control-user" id="password" placeholder="Password">
	                  </div>
	                </div>
	                <input type="hidden" id="register-link" data-link="<?php echo site_url('login/register/1');?>">
	                <Button type="button" class="btn btn-info btn-user btn-block">
	                  Register Account
	                </Button>
	                <!--
	                <hr>
	                <a href="index.html" class="btn btn-google btn-user btn-block">
	                  <i class="fab fa-google fa-fw"></i> Register with Google
	                </a>
	                <a href="index.html" class="btn btn-facebook btn-user btn-block">
	                  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
	                </a>
	            	-->
	              </form>
	              <hr>
	              <div class="text-center">
	                <a class="small" href="<?php echo site_url('login/change_password');?>">Forgot Password?</a>
	              </div>
	              <div class="text-center">
	                <a class="small" href="<?php echo site_url('login');?>">Already have an account? Login!</a>
	              </div>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	  <div class="container">
	  	<div class="poper">
		</div>
	  </div>
	  <!-- Bootstrap core JavaScript-->
	  <script src="<?php echo base_url('vendor/jquery/jquery.min.js');?>"></script>
	  <script src="<?php echo base_url('vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

	  <!-- Core plugin JavaScript-->
	  <script src="<?php echo base_url('vendor/jquery-easing/jquery.easing.min.js');?>"></script>

	  <!-- Custom scripts for all pages-->
	  <script src="<?php echo base_url('js/sb-admin-2.min.js');?>"></script>
	  <script src="<?php echo base_url('js/notify.js');?>"></script>
	  <script src="<?php echo base_url('js/register.js');?>"></script>


	</body>

</html>