<!DOCTYPE html>
<html>
	<head>
		<title> Patients </title>
	 		<link href="<?php echo base_url('vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">
	 	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	  <!-- Custom styles for this template-->
		 <link href="<?php echo base_url('css/bootstrap2.css');?>" rel="stylesheet">
	 	 <link href="<?php echo base_url('vendor/datatables/dataTables.bootstrap4.min.css');?>" rel="stylesheet">
	 	 <script src="<?php echo base_url('vendor/jquery/jquery.min.js');?>"></script>
		<script src="<?php echo base_url('js/notify.js');?>"></script>
		<style>
			.form-element{
				margin:10px;
				padding:10px;
			}
		</style>
 	</head>	<body id="page-top">

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
	          <h1 class="h3 mb-2 text-gray-800" style="float:left">Patients</h1>
	          <p class="mb-4" style="float:right">
	          	 <a href="<?php echo site_url('dashboard/patients_info/'.$facility.'/1');?>" class="btn btn-success btn-circle btn-lg"  title="Create patient">
                    <i class="fas fa-check"></i>
                  </a>
	          </p>
	          <!-- DataTales Example -->
	          <div class="card shadow mb-4" style="clear:both">
	            <div class="card-header py-3">
	              <h6 class="m-0 font-weight-bold text-primary">Patients Vitals  View</h6>
	            </div>
	            <div class="card-body">
	              <div class="table-responsive" style="width:750px;">
				        <form>
						<section class="form-group">
											
							<ul class="user-update" style="list-style-type:none;">
								<li class="form-element">
									<b>Patient ID:</b>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<span><?php echo $patient->patientID?></span>&nbsp;
									<b>Patient Name: </b><?php echo $patient->name;?></span>
								</li>
								<li class="form-element">

								 	<b>Date:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								 	<?php 
								 		$d=DATE("Y-m-d");
								 	?>
								 	<input id="date" type="date" size="20" value="<?php echo $d; ?>"/>&nbsp;
								 	<b>Temperature:</b> &nbsp;<input type="text" id="temperature" size="20" placeholder="In Degree celsius"/>
								</li>
								<li class="form-element">
								<b>Weight:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="text" id="weight" size="20" placeholder="In Kilograms"/>
								<b>Height:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<Input type="text" id="height" size="20" placeholder="In Meters"/>
								</li>
								<li class="form-element">
									<b>Pressure:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><input type="text" id="sys" size="6" placeholder="SYS"/> <input type="text" id="dia" size="6" placeholder="DIA"/> <input type="text" id="pulse" size="6" placeholder="Pulse"/>&nbsp;
									
								</li>
								<li class="form-element">
									<b>Blood Sugar:</b> &nbsp;<input type="text" id="bloodsugar" size="20" placeholder=""/>
								</li>
							</ul>
												
							
							</br>
								<div class="form-group"	>			
									<button class="btn btn-primary" id="save-vitals" type="button" data-value="<?php echo site_url('dashboard/patient_vitals/'.$facility.'/'.$patient->patientID.'/1');?>">
											 Save Vitals
									</button>
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
	  <script src="<?php echo base_url('js/notify.js');?>"></script>
	  <script src="<?php echo base_url('js/patients.js');?>"></script>
	  <!-- Page level custom scripts -->
	  

	</body>

</html>