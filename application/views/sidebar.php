<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

	      <!-- Sidebar - Brand -->
	      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('dashboard/index/'.$facility); ?>">
	        <div class="sidebar-brand-icon rotate-n-15">
	          <i class="fas fa-laugh-wink"></i>
	        </div>
	        <div class="sidebar-brand-text mx-3">Emedics Admin <sup>2</sup></div>
	      </a>

	      <!-- Divider -->
	      <hr class="sidebar-divider my-0">

	      <!-- Nav Item - Dashboard -->
	     <!-- Nav Item - Pages Collapse Menu -->
		<?php if($user->userType=="Administrator" OR $user->extra_roles=="Administrator"):?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Administration</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Expert Consultation:</h6>
            <a class="collapse-item" href="<?php echo site_url('diseaseadministration/index/'.$facility);?>">Diagnosis Administration</a>
            <a class="collapse-item" href="<?php echo site_url('diseaseadministration/medicine/'.$facility);?>">Medicines</a>
            <a class="collapse-item" href="#">Medical Test</a>
	    
          </div>
        </div>
      </li>
	  <?php endif;?>
	  <?php if($user->userType=="Doctor" OR $user->userType=="Nurse" OR $user->userType=="Administrator" OR $user->extra_roles=="Administrator"):?>
	      <li class="nav-item">
	        <a class="nav-link" href="<?php echo site_url('dashboard/consultations/'.$facility);?>">
	          <i class="fas fa-fw fa-tachometer-alt"></i>
	          <span>Consultation</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="">
	          <i class="fas fa-fw fa-th""></i>
	          <span>Schedule Consultation</span></a>
	      </li>
	  <?php endif;?>
	      <!-- Divider -->
	      <hr class="sidebar-divider">

	      <!-- Heading -->
	      <div class="sidebar-heading">
	        Interface
	      </div>

	      <!-- Nav Item - Pages Collapse Menu -->
	      <?php if($user->userType=="Administrator" OR $user->extra_roles=="Administrator"):?>
	      <li class="nav-item">
	        <a class="nav-link collapsed" href="<?php echo site_url('dashboard/invited_users/'.$facility);?>">
	          <i class="fas fa-fw fa-users"></i>
	          <span>Users</span>
	        </a>
	       
	      </li>
	  	<?php endif;?>
	      <!-- Nav Item - Utilities Collapse Menu -->
	      <li class="nav-item">
	        <a class="nav-link collapsed" href="<?php echo site_url('dashboard/settings/'.$facility);?>">
	          <i class="fas fa-fw fa-wrench"></i>
	          <span>Settings</span>
	        </a>
	    
	      </li>

	      <!-- Divider -->
	      <hr class="sidebar-divider">

	      <!-- Heading -->
	      <div class="sidebar-heading">
	        Addons
	      </div>

	      <!-- Nav Item - Pages Collapse Menu -->
	      <li class="nav-item">
	        <a class="nav-link collapsed" href="<?php echo site_url('dashboard/patients_info/'.$facility);?>">
	          <i class="fas fa-fw fa-folder"></i>
	          <span>Patients</span>
	        </a>
	      </li>

	      <!-- Nav Item - Charts -->
		<?php if($user->userType=="Administrator" OR $user->userType=="Pharmacist" OR $user->userType=="Doctor" OR $user->extra_roles=="Administrator"):?>
	      <li class="nav-item">
	        <a class="nav-link" href="#">
	          <i class="fas fa-fw fa-chart-area"></i>
	          <span>Prescriptions</span></a>
	      </li>
		<?php endif;?>

	   
	      <?php if($user->userType=="Laboratory Technologist" OR $user->userType=="Doctor" OR $user->userType=="Administrator" OR $user->extra_roles=="Administrator"):?>
		<li class="nav-item">
	        <a class="nav-link collapsed" href="<?php echo site_url('dashboard/patients_info/'.$facility);?>">
	          <i class="fas fa-fw fa-table"></i>
	          <span>Prescribed Medical Tests</span>
	        </a>
	      </li>
		  <?php endif;?>
		     <!-- Nav Item - Tables -->
	      <li class="nav-item">
	        <a class="nav-link" href="<?php echo site_url('dashboard/patient_history/'.$facility);?>">
	          <i class="fas fa-fw fa-file"></i>
	          <span>Patient History</span>
	      	</a>
	      </li>
	      <!-- Divider -->
	      <hr class="sidebar-divider d-none d-md-block">

	      <!-- Sidebar Toggler (Sidebar) -->
	      <div class="text-center d-none d-md-inline">
	        <button class="rounded-circle border-0" id="sidebarToggle"></button>
	      </div>

	    </ul>