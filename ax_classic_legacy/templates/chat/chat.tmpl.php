<?php session_start();?>

<head>
	<title>Chat Dialogue2</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="./css/chat.css"></link>
	<script type="application/javascript" src="./js/jquery-3.3.1.min.js"></script>
	<script type="application/javascript" src="./js/jquery.animate-colors-min.js"></script>
</head>
<body>
	<p id="welcome">Welcome, <?php echo ($_SESSION["username"]) ? ($_SESSION["username"])."!<a id='logout' href='./logout.php'>logout</a><br/>" : "Guest!"; ?></p>
	<div id="chatWrap">
	<div id="chatBox"></div><div id="userPane"></div>
	<?php if($_SESSION["username"]) { ?>
	<input id="inputBox" type="text" autocomplete="off" placeholder="Type to Chat..." required/>
	<input id="submitChat" type="button" value="Send"/>
	<br><br>
	</div>
	<?php } else { ?>
	</div>
	<input id="loginSubmit" type="button" value="Login"/><input id="registerSubmit" type="button" value="Register"/>
	<form id ="formLogin" action="" method="POST">
	<div id="loginRegister"></div><br>
	Username: <input id="username" type="text" placeholder="Username" autocomplete="off" required/><div id="userError"></div><br/>
	Password: <input id="password" type="text" placeholder="Password" autocomplete="off" required/><div id="passError"></div><br/>
	<p id="verifyP">Verify: </p><input id="verify" type="text" placeholder="Verify Password" autocomplete="off" required/><div id="verifyError"></div>
	<input id="login" type="button" value="Login"/><br/>
	<input id="register" type="button" value="Register"/>
	</form><br/>
	<div id="formResults"></div>
	<?php } ?>
	<script type="application/javascript" src="./js/chatbox.js"></script>
	<script type="application/javascript" src="./js/chat.js"></script>
</body>