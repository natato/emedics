<!DOCTYPE html>
<html>
	<head>
		<title> Patients </title>
	 		<link href="<?php echo base_url('vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">
	 	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	  <!-- Custom styles for this template-->
			<style>
				.modal-content{
					//visibility:hidden;
				}
				.user-update{
				}
				.form-element{
					padding:10px;
					margin:10px;
				}
						
			</style>
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
				<div class=“update-row”>
				<div class=“col-md-9 col-xl-6”
				<div class=“modal” id=“modal”>
				  <div class=“modal-dialog”>
				        <div class=“modal-content”>
					<div class=“modal-header”><h3></h3></div>
					<div class=“modal-content”>
						
					</div>
				      <div>
				  </div>
				</div>
				 <script type="text/javascript">
				        $("#modal").modal("show");
				  </script>
				</div>
				</div>
	
	        <div class="container-fluid">

	          <!-- Page Heading -->
	          <h1 class="h3 mb-2 text-gray-800" style="float:left">Users</h1>
	          <p class="mb-4" style="float:right">
	          	 <a href="<?php echo site_url('dashboard/patients_info/'.$facility.'/1');?>" class="btn btn-success btn-circle btn-lg"  title="Create patient">
                    <i class="fas fa-check"></i>
                  </a>
	          </p>
				
			


	          <!-- DataTales Example -->
	          <div class="card shadow mb-4" style="clear:both">
	            <div class="card-header py-3">
	              <h6 class="m-0 font-weight-bold text-primary">Update User Information</h6>
	            </div>
	            <div class="card-body">
	              <div class="table-responsive">
					       <form method="POST" action="<?php echo site_url('dashboard/update_or_add_users/'.$facility.'/'.$usertoupdate->userID.'/1');?>">
						<section class="form-group">			
							<ul class="user-update" style="list-style-type:none;">
								<li class="form-element"> <input type="hidden" name="userID" value="<?php echo $usertoupdate->userID;?>"/></li>
								<li class="form-element">FirstName: <input type="text" name="firstname" size="40" value="<?php echo $usertoupdate->Firstname;?>" /></li>
									<li class="form-element">LastName: <input type="text" name="lastname" size="40" value="<?php echo $usertoupdate->Lastname;?>" /></li>
								<li class="form-element">
									Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="text" name="email" size="40" value="<?php echo $usertoupdate->emailAddress; ?>"/> 
									
								</li>
								<li class="form-element">
									UserType:&nbsp;&nbsp;&nbsp;<select name="usertype" />
										<option value="0">Select options</option>
										<option value="Administrator" <?php if($usertoupdate->userType=="Administrator"){echo "selected='selected'";} ?>>Administrator</option>
										<option value="Doctor" <?php if($usertoupdate->userType=="Doctor"){echo "selected='selected'";} ?>>Doctor</option>
										<option value="Nurse" <?php if($usertoupdate->userType=="Nurse"){echo "selected='selected'";} ?>>Nurse</option>
										<option value="Pharmacist">Pharmacist</option>
										<option value="Laboratory Technologist" <?php if($usertoupdate->userType=="Laboratory Technologist"){echo "selected='selected'";} ?>>Laboratory Technologist</option>
										<option value="OPD Officer" <?php if($usertoupdate->userType=="OPD Officer"){echo "selected='selected'";} ?>>OPD Officer</option>
									</select>
									Activated: <select name="activated"/>
										<option value="select Option">Select options</option>
										<option value="1"<?php if($usertoupdate->activated==1){echo "selected='selected'";} ?> >Yes</option>
										<option value="0"<?php if($usertoupdate->activated==0){echo "selected='selected'";} ?>>No</option>
									</select>

								</li>
								<li class="form-element">
									Extra Roles:
									<select name="extra_roles" />
										<option value="0">Select options</option>
										<option value="Super Administrator"<?php if($usertoupdate->extra_roles=="Super Administrator"){echo "selected='selected'";} ?>>Super Administrator</option>
										<option value="Administrator" <?php if($usertoupdate->extra_roles=="Administrator"){echo "selected='selected'";} ?>>Administrator</option>
										<option value="none"<?php if($usertoupdate->extra_roles=="none"){echo "selected='selected'";} ?>>None</option>
									</select>
									

								</li>
							</ul>
												
							
							</br>
								<div class="form-group"	>			
								<button class="btn btn-primary" type="submit">
									Update Users Details
								</button>
								</div>
							</div>
								<div class="poper">

								</div>
						</section>
					</form>
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
	          <a class="btn btn-primary" href="login.html">Logout</a>
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