// Chat box javascript jQuery
var $register = false, userSymbol = false, passSymbol = false;
$(document).ready(function() {
	$("#verify").prop("disabled", true);
	// login button
	$("#loginSubmit").on("click", function() {
		$(this).slideUp(300);
		$("#registerSubmit").slideUp(300);
		$("#loginRegister").html("Please login to chat");
		$("#formLogin").css({"display":"inline"});
		$("#login").css({"display":"inline"});
		//$("#password").css({"display":"inline"});
	});
	// register button
	$("#registerSubmit").on("click", function() {
		$register = true;
		$(this).slideUp(300);
		$("#loginSubmit").slideUp(300);
		$("#loginRegister").html("Please Register to chat");
		$("#formLogin").css({"display":"inline"});
		$("#verifyP").css({"display":"inline-block"});
		$("#verify").css({"display":"inline"});
		$("#register").css({"display":"inline"});
	});
	// login fields
	$("#username").keyup(function() {
		$usernameVal = $("#username").val(); 
		var usernameLen = /^[a-zA-Z0-9]*$/;
		var symbolEval = usernameLen.test($usernameVal);
		if( !symbolEval ) {
			userSymbol = true;
			$("#userError").html("*Username cannot have spaces or symbols!");
		} else {
			userSymbol = false;
			$("#userError").empty();
		}
	});
	$("#password").keyup(function() {
		if( $register ) {
			$("#verify").prop("disabled", false);
		}
		$passwordVal = $("#password").val(); 
		var $passwordLen = $("#password").val().length;
		var passwordLen = /^[a-zA-Z0-9]*$/;
		var symbolEval = passwordLen.test($passwordVal);
		if( !symbolEval ) {
			passSymbol = true;
			$("#passError").html("*Password cannot have spaces or symbols!");
		} else {
			passSymbol = false;
			$("#passError").empty();
		}
		if( $passwordLen == 0 ) {
			$("#verify").prop("disabled", true);
		}
	});
	// on register verify
		$("#verify").keyup(function() {
			var $passVal = $("#password").val();
			var $verifyVal = $("#verify").val();
			if( $verifyVal == $passVal ) {
				$("#verifyError").css({"display":"inline","color":"green"}).html("*Passwords match!");
			} else {
				$("#verifyError").removeAttr("style");
				$("#verifyError").css({"display":"inline"}).html("*Passwords must match!");
			}
		});
	
	$("#login").on("click", function() {
		var $userLen = $("#username").val().length;
		var $passLen = $("#password").val().length;
		var $userVal = $("#username").val();
		var $passVal = $("#password").val();
		if( userSymbol || passSymbol ) {
			$("#formResults").css({"display":"inline"}).html("*Username or password must contain normal characters.");
		} else if( $userLen == 0 || $passLen == 0 ) {
			$("#formResults").css({"display":"inline"}).html("*Username or password cannot be blank.");
		} else {
			// ajax here
			$.ajax({
				type: "POST",
				url: "./db.php",
				data: {username:$userVal,password:$passVal,register:$register},
				success: function(data) {
					$("#formResults").css({"display":"inline","color":"black"}).html(data);
					$("#username").val("");
					$("#password").val("");
					setTimeout(function() {
						window.location = "./index.php?editor=chat";
						//window.location.href = "./index.php?editor=chat";
						//window.location.replace("./index.php?editor=chat");
					}, 1000);
					//window.location = "./index.php?editor=monitor";
				},
				error: function() {
					$("#formResults").css({"display":"inline"}).html("*An error has occured please try again later.");
				}
			});
		}
	});
	$("#register").on("click", function() {
		var $userLen = $("#username").val().length;
		var $passLen = $("#password").val().length;
		var $verifyLen = $("#verify").val().length;
		var $userVal = $("#username").val();
		var $passVal = $("#password").val();
		var $verifyVal = $("#verify").val();
		if( userSymbol || passSymbol ) {
			$("#formResults").css({"display":"inline"}).html("*Username or password must contain normal characters.");
		} else if( $userLen == 0 || $passLen == 0 ) {
			$("#formResults").css({"display":"inline"}).html("*Username or password cannot be blank.");
		} else if( $verifyVal != $passVal ) {
			$("#formResults").css({"display":"inline"}).html("*Passwords must match to register!");
		} else {
			// ajax here
			$.ajax({
				type: "POST",
				url: "./db.php",
				data: {username:$userVal,password:$passVal,register:$register},
				beforeSend: function() {
					$("#formResults").css({"display":"inline","color":"black"}).html("Processing...");
				},
				success: function(data) {
					$("#formResults").css({"display":"inline","color":"black"}).html(data);
					setTimeout(function() {
						window.location = "./index.php?editor=chat";
					}, 1000);
				},
				error: function() {
					$("#formResults").css({"display":"inline"}).html("*An error has occured please try again later.");
				}
			});
		}
	});
});