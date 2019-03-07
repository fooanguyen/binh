<?php
	session_start();
	
	if(isset($_POST["login"])){
		$username = validate($_POST["username"]);
		$password = validate($_POST["password"]);
			
		//php7 if(password_verify($password, password_hash("pass", PASSWORD_DEFAULT)) && $username == "user"){
		if(crypt($password, "$6$rounds=5000$lkjaslfjlkwnerlkwmjrlmelwqkelqkwejlk$" ) == crypt("testing", "$6$rounds=5000$lkjaslfjlkwnerlkwmjrlmelwqkelqkwejlk$") && $username == "admin"){
			$_SESSION["logged-in"] = true;
			header("Location: ../gallery_upload.php");
			exit();
		}
		else{
			header("Location: ../index.php");
			exit();
		}
	 }

	function validate($input){
		return $input = htmlspecialchars(stripslashes(trim($input)));
	}

?>