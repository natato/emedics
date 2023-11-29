$(document).ready(function(){
	$("#updatebtn").click(function(){
		//alert(" loading update user view");
	});
	$("#sendmessagebtn").click(function(){
		alert("loading messaging view");
	});
	$("#deleteuserbtn").click(function(){
		var response=confirm("Deleting selected user record?");
		if (response==true){

		}
		else{
			
		}
	});
	$("#addRow").click(function(){
		var numberOfRows=$("#numberOfRows").val();
		var i=0;
		if(numberOfRows.length==0){
			alert("Enter a value for number of rows");
		}
		else if(numberOfRows<=0){
			alert("Enter a value greater than zero (0)");
		}
		if((numberOfRows.length>0)&&(numberOfRows>=1))
			for(i=0;i<numberOfRows;i++){
				//create input group for adding users and append to form
				$("#newuserTbl tbody").append("<tr class='newuser_row'> <td><input type='text' name='firstname[]' required placeholder='Firstname'></td> <td><input type='text' name='lastname[]' required placeholder='Lastname'></td><td><input type='email' name='email[]' required placeholder='Email Address'></td><td> <select name='role[]'> <option value='0'>Select Option</option><option value='Adminstrator'>Adminstrator</option><option value='Doctor'>Doctor</option><option value='Pharmacist'>Pharmacist</option><option value='Laboratory Technologist'>Laboratory Technologist</option><option value='OPD Officer'>OPD Officer</option></select></td></tr>");
			}
	});
	$("#inviteUsers").click(function(){
		var firstnameArray=array();
		var lastnameArray =array();
		var emailArray =array();
		var roleArray=array();
		var i=0;
		/*
		$(".firstname").each(function(){
			firstnameArray[i]=$(this).val();
			i++;
			alert($(this).val());
		});
		*/
	});
});