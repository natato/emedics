function showWarning(msg){
	$.notify(msg,"danger");
}
function showMessage(msg){
	$.notify(msg,"success");
}
$(document).ready(function(){
	
	$("#create").click(function(){
		var name=$("#name").val();
		var town=$("#town").val();
		var dob=$("#dob").val();
		var dofv=$("#dofv").val();
		var phone=$("#phone").val();
		if(name.length==0){
			showWarning("Please enter Patient Name");
		}
		else if(town.length==0){
			showWarning("Please enter Patient Town");
		}
		else if(dob.length!=10){
			showWarning("Please enter a valid Date of Birth");
		}
		else if(dofv.length!=10){
			showWarning("Please enter a valid Date of First Visit");
		}
		else if(phone.length<10){
			showWarning("Please enter  valid phone number");
		}
		else{
			showMessage("Saving Patient Basic Information");
			var addpatientlink=$("#patient-link").data("link");
			$.ajax({
				url:addpatientlink,
				type:"POST",
				async:false,
				data:{
					"name":name,
					"town":town,
					"dob":dob,
					"dofv":dofv,
					"phone":phone	
				}

			}).done(function(data){
				$("#name").val("");
				$("#town").val("");
				$("#dob").val("");
				$("#dofv").val("");
				$("#phone").val("");
				showMessage(data);
			}).fail(function(){
				showMessage("Failed");
			});
		}
	});
	$("#update").click(function(){
		var name=$("#name").val();
		var town=$("#town").val();
		var dob=$("#dob").val();
		var dofv=$("#dofv").val();
		var phone=$("#phone").val();
		if(name.length==0){
			showWarning("Please enter Patient Name");
		}
		else if(town.length==0){
			showWarning("Please enter Patient Town");
		}
		else if(dob.length!=10){
			showWarning("Please enter a valid Date of Birth");
		}
		else if(dofv.length!=10){
			showWarning("Please enter a valid Date of First Visit");
		}
		else if(phone.length<10){
			showWarning("Please enter  valid phone number");
		}
		else{
			showMessage("Updating Patient Basic Information");
			var updatepatientlink=$("#update-link").data("link");
			$.ajax({
				url:updatepatientlink,
				type:"POST",
				async:false,
				data:{
					"name":name,
					"town":town,
					"dob":dob,
					"dofv":dofv,
					"phone":phone	
				}

			}).done(function(data){
				$("#name").val("");
				$("#town").val("");
				$("#dob").val("");
				$("#dofv").val("");
				$("#phone").val("");
				showMessage(data);
			}).fail(function(){
				showMessage("Failed");
			});
		}
	});
	$(".delete-patient").click(function(){
		var choice=confirm("Delete selected record ?");
		var patientid=$(this).data("value");
		var link=$(this).data("link");
		if(choice==true){
			$.ajax({
				url:link,
				type:"POST",
				async:false,
				data:{
					"patientid":patientid
				}
			}).done(function(data){
				showMessage(data);
			}).fail(function(){
				showMessage("Failed");
			});
		}
	});
	$("#save-vitals").click(function(){
		var date=$("#date").val();
		var temperature=$("#temperature").val();
		var weight=$("#weight").val();
		var height=$("#height").val();
		var sys=$("#sys").val();
		var dia=$("#dia").val();
		var pulse=$("#pulse").val();
		var bloodsugar=$("#bloodsugar").val();
		var link=$(this).data("value");
		if(temperature.length==0){
			showWarning("Please enter value for Temperature");
			return;
		}
		else if(weight.length==0){
			showWarning("Please enter value for Weight");
			return;
		}
		else if(height.length==0){
			showWarning("Please enter value for Height");
			return;
		}
		else if(sys.length==0){
			showWarning("Please enter the Systolic value for Pressure");
			return;
		}
		else if(dia.length==0){
			showWarning("Please enter the Diastolic value for Pressure");
			return;
		}
		else if(pulse.length==0){
			showWarning("Please enter the Pulse  value for Pressure");
			return;
		}
		$.ajax({
			url:link,
			type:"POST",
			async:false,
			data:{
				"date":date,
				"temperature":temperature,
				"weight":weight,
				"height":height,
				"sys":sys,
				"dia":dia,
				"pulse":pulse,
				"bloodsugar":bloodsugar
			}
		}).done(function(data){
			$("#date").val(" ");
			$("#temperature").val(" ");
			$("#weight").val(" ");
			$("#height").val(" ");
			$("#sys").val(" ");
			$("#dia").val(" ");
			$("#pulse").val(" ");
			$("#bloodsugar").val(" ");
			showMessage(data);
		}).fail(function(){
			showMessage("Failed");
		});

	});
	
});