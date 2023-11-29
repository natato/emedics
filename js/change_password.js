function showMsg(i){
	var msg;
	if(i==1){
		 msg="Please enter a valid email address";
	}else if(i==2){
		msg="Sending you a password reset link";
	}
	else{
		msg="A password reset link has been sent to your email address"
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
		var email=$("#email").val();
		var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
		if(!email.match(emailExp)){
			showMsg(1);
			return;
		}
		showMsg(2);
    var register_link=$("#change-password-link").data("link");
      $.ajax({
      url:register_link,
      type:"POST",
      async:false,
      data:{
        "email":email
      }
    }).done(function(data){
      $("#email").val("");
      if(data=="Password link sent"){
        showMsg(3);
      }
    }).fail(function(){
      alert("fail");
    });
    
	});
});