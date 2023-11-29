<!DOCTYPE html>
<html>
	<head>
		<title>Dashboard</title>
	 	<link href="<?php echo base_url('vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">
	 	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	  <!-- Custom styles for this template-->
		 <link href="<?php echo base_url('css/bootstrap2.css');?>" rel="stylesheet">
	 	 <link href="<?php echo base_url('vendor/datatables/dataTables.bootstrap4.min.css');?>" rel="stylesheet">
 	</head>
	<body id="page-top">

	  <!-- Page Wrapper -->
	  <div id="wrapper">

	    <!-- Sidebar -->
	    <?php require_once("sidebar.php")?>
	    <!-- End of Sidebar -->

	    <!-- Content Wrapper -->
	    <div id="content-wrapper" class="d-flex flex-column">

	      <!-- Main Content -->
	      <div id="content">
	      		<!-- Topbar -->
	      	 	<?php require_once("topbar.php")?>
	      		<!-- End of Topbar -->

	        <!-- Begin Page Content -->
	        <div class="container-fluid">

	          <!-- Page Heading -->
	          <h1 class="h3 mb-2 text-gray-800" style="float:left">Settings</h1>
	       
	          <!-- DataTales Example -->
	          <div class="card shadow mb-4" style="clear:both">
	            <div class="card-header py-3">
	              <h6 class="m-0 font-weight-bold text-primary">Update Settings</h6>
	            </div>
	            <div class="card-body">
	              <div class="table-responsiv">
						<div class="row">
						    <div class="col-xl-6 col-md-6 mb-4">
					          	<form method="POST" action="<?php echo site_url('dashboard/settings/'.$facility.'/1');?>">
								<div class="form-group">
										<label>System Theme</lable>
										<select class="form-control" name="systemtheme">
											<option value="0">Select Theme</option>
											<option value="primary">Primary</option>
											<option value="info">Info</option>
											<option value=success"">Success</option>
											<option value="warning">Warning</option>
											<option value="danger">Danger</option>
										</select>
									<label>Button Theme</lable>
										<select class="form-control" name="buttontheme">
											<option value="0">Select Theme</option>
											<option value="primary">Primary</option>
											<option value="info">Info</option>
											<option value=success"">Success</option>
											<option value="warning">Warning</option>
											<option value="danger">Danger</option>
										</select>
									</br>

									<button type="submit" class="btn btn-lg btn-info">Update Theme</button>
								</div>
							</form>	
							<form method="POST" action="<?php echo site_url('dashboard/settings/'.$facility.'/2');?>">
								<div class="form-group">
									<label>Firstname</label>
									<input type="text" class="form-control" name="firstname"/></br>
									<label>Lastname</label>
									<input type="text" class="form-control" name="lastname"/></br>
									
									<button type="submit" class="btn btn-lg btn-info">Update Name</button>
								</div>
							</form>	             
						 </div>		
					     <div class="col-xl-6 col-md-6 mb-4">
					          			     
							<form method="POST" action="<?php echo site_url('dashboard/settings/'.$facility.'/3');?>">
								<label>Old Password</label>
								<input type="text" class="form-control" name="oldpassword"/></br>
								<label>New Password</label>
								<input type="text" class="form-control" name="newpassword"/></br>
								<label>Confirm New Password</label>
								<input type="text" class="form-control" name="confirmnewpassword"/></br>
								<button type="submit" class="btn btn-lg btn-info">Update Password</button>
							</form>	
						</div>
	              </div>
	            </div>
	          </div>

	        </div>
	        <!-- /.container-fluid -->

	      </div>
	      <!-- End of Main Content -->

	      <!-- Footer -->
	      <footer class="sticky-footer bg-white">
	        <div class="container my-auto">
	          <div class="copyright text-center my-auto">
	            <span>Copyright &copy; Emedics <?php echo DATE("Y");?></span>
	          </div>
	        </div>
	      </footer>
	      <!-- End of Footer -->

	    </div>
	    <!-- End of Content Wrapper -->

	  </div>
	  <!-- End of Page Wrapper -->

	  <!-- Scroll to Top Button-->
	  <a class="scroll-to-top rounded" href="#page-top">
	    <i class="fas fa-angle-up"></i>
	  </a>

	  <!-- Logout Modal-->
	  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog" role="document">
	      <div class="modal-content">
	        <div class="modal-header">
	          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
	          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	            <span aria-hidden="true">×</span>
	          </button>
	        </div>
	        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
	        <div class="modal-footer">
	          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
	          <a class="btn btn-primary" href="<?php echo site_url('login/logout'); ?>">Logout</a>
	        </div>
	      </div>
	    </div>
	  </div>

	  <!-- Bootstrap core JavaScript-->
	  <script src="<?php echo base_url('vendor/jquery/jquery.min.js');?>"></script>
	  <script src="<?php echo base_url('vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

	  <!-- Core plugin JavaScript-->
	  <script src="<?php echo base_url('vendor/jquery-easing/jquery.easing.min.js');?>"></script>

	  <!-- Custom scripts for all pages-->
	  <script src="<?php echo base_url('js/sb-admin-2.min.js');?>"></script>

	  <!-- Page level plugins -->
	  <script src="<?php echo base_url('vendor/datatables/jquery.dataTables.min.js');?>"></script>
	  <script src="<?php echo base_url('vendor/datatables/dataTables.bootstrap4.min.js');?>"></script>

	  <!-- Page level custom scripts -->
	  <script src="<?php echo base_url('js/demo/datatables-demo.js');?>"></script>

	</body>

</html>