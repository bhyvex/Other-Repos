// the chatbox to pull data
var $text = 0, $textLen = 0;
// function to load the bottom newest upon y overflow
function scrollBottom() {
	$("#chatBox").load("./chatLoad.php", function() {
		$("#chatBox").scrollTop($("#chatBox")[0].scrollHeight);
	});
}
$(document).ready(function() {
	scrollBottom();
	setInterval(function() {
		scrollBottom();
		// userPane section with online users
		$("#userPane").load("./online.php");
	}, 3000);
	
	// chat field
	$("#inputBox").keyup(function() {
		$text = $(this).val();
		$textLen = $(this).val().length;
	});
	// if pressed enter
	$('#inputBox').keypress(function(e) {
         if(e.which === 13){ // enter
			if( $textLen == 0 ) {
				$text = 0;
			} else {
				$.ajax({
					type: "POST",
					url: "./chatLoad.php",
					data: {text:$text},
					success: function() {
						$textLen = 0;
						$("#inputBox").val("");
						scrollBottom();
					}
				});
			}
         }
   });
	// on click
	$("#submitChat").on("click", function() {
		if( $textLen == 0 ) {
			$text = 0;
		} else {
			$.ajax({
				type: "POST",
				url: "./chatLoad.php",
				data: {text:$text},
				success: function() {
					$textLen = 0;
					$("#inputBox").val("");
					scrollBottom();
				}
			});
		}
	});
	// userPane section with online users
	$("#userPane").load("./online.php");
});