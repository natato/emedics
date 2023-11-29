function showMsg(i){
    var msg="";
  switch(i){
    case 1:
      msg="Please enter value for firstname";
    break;
    case 2:
      msg="Please enter a value for lastname";
    break;
    case 3:
      msg="Please enter a value for medical facility name";
    break;
    case 4:
      msg="Please enter a valid email address";
    break;
    case 5:
      msg="Password must be at least six characters";
    break;
    case 6:
      msg="Your account has been activated";
    break;
    case 7:
      msg="User email already exits";
    break;
    case 8:
      msg="Check your spam folder if email is not in inbox";
    break;
    default:
      msg="You have been sent a verification email to activate your account";
    break;
  }
  $(".poper").notify(
      msg,"success",
      {
        position:"bottom left",
        showDuration:1000,
      }
   );
 
}
$(document).ready(function(){
	$(".btn").click(function(){
		var firstname=$("#firstname").val();
		var lastname=$("#lastname").val();
		var facility=$("#facility").val();
		var email=$("#email").val();
		var password=$("#password").val();
		if(firstname.length==0){
			showMsg(1);
			return;
		}
		if(lastname.length==0){
			showMsg(2);
			return;
		}
		if(facility.length==0){
			showMsg(3);
			return;
		}
		 var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
		if(!email.match(emailExp)){
			showMsg(4);
			return;
		}
		if(password.length<=5){
			showMsg(5);
			return;
		}
    var register_link=$("#register-link").data("link");
      $.ajax({
      url:register_link,
      type:"POST",
      async:false,
      data:{
        "firstname":firstname,
        "lastname":lastname,
        "email":email,
        "password":password,
        "facility":facility
      }
    }).done(function(data){
      $("#firstname").val("");
      $("#lastname").val("");
      $("#email").val("");
      $("#password").val("");
      $("#facility").val("");
      if(data=="email already exists"){
        showMsg(7);
      }
      else{
        showMsg(0);
      }
    }).fail(function(){
      alert("fail");
    });
    
	});
});