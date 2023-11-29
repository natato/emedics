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
	          <h1 class="h3 mb-2 text-gray-800" style="float:left">Users</h1>
	          <!--
	          <p class="mb-4" style="float:right">
	          	 <a href="<?php echo site_url('dashboad/invited_users/1');?>" class="btn btn-success btn-circle btn-lg"  title="Invite Users">
                    <i class="fas fa-users"></i>
                  </a>
	          </p>
	      		-->
	          <!-- DataTales Example -->
	          <div class="card shadow mb-4" style="clear:both">
	            <div class="card-header py-3">
	              <h6 class="m-0 font-weight-bold text-primary">New Users</h6>
	            </div>
	            <div class="card-body">
	              <div class="table-responsiv">
	              		<form method="POST" action="<?php echo site_url('dashboard/invited_users/'.$facility.'/2');?>">
						<table border="1" id="newuserTbl">
								<thead>
									<tr><td>Firstname</td><td>Last Name</td><td>Email Address</td> <td>Role</td></tr>
								</thead>
								<tbody>
									<tr class="newuser_row">
										<td><input type="text" name="firstname[]"  placeholder="Firstname" required/></td>
										<td><input type="text" name="lastname[]" placeholder="Lastname" required /></td>
										<td><input type="email" name="email[]" placeholder="Email Address" required/></td>
										<td>
											<select type="text" name="role[]">
												<option value="0">Select Option</option>
												<option value="Administrator">Administrator</option>
												<option value="Doctor">Doctor</option>
												<option value="Pharmacist">Pharmacist</option>
												<option value="Administrator">Nurse</option>
												<option value="Laboratory Technologist">Laboratory Technologist</option>
												<option value="OPD Officer">OPD Officer</option>
											</select>
										</td>
									</tr>
								</tbody>
						</table>
						<div style="margin:5px;padding:5px;">
							<input type="text" id="numberOfRows" placeholder="No. of Rows"/>&nbsp;&nbsp;&nbsp;&nbsp;
							<button class="btn btn-primary" id="addRow" type="button">Add Rows</button>
							&nbsp;&nbsp;&nbsp;&nbsp;
							<button class="btn btn-success" id="inviteUsers" type="submit" >Invite User(s)</button>
						</div>
						<h6><?php if(!empty($msg)){echo $msg;} ?></h6>
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
	  
	  <script src="<?php echo base_url('js/users.js');?>"></script>

	</body>

</html>