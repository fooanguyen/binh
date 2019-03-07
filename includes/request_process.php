<?php
    session_start();

    if(isset($_POST["submit"])){
        if($_POST["fullname"]==""||$_POST["phone"]==""||$_POST["subject"]==""||$_POST["request"]==""){
            $_SESSION["contact"] = "empty";
        }
        else{

            $to      = 'serenitynailsspa@serenitynailsspa.com';
            $phone   = htmlspecialchars($_POST['phone']);
            $subject = htmlspecialchars($_POST['subject']);
            $message = htmlspecialchars($_POST['request']);
            $email   = htmlspecialchars($_POST['email']);
            $message .= "\r\n". "Phone#: ". $phone . "\r\n". "email: ". $email;
            $headers = "From: ". $to . "\r\n" .
                "Reply-To: " .$email . "\r\n" .
				"X-Mailer: PHP/" . phpversion();
				
            if(mail($to, $subject, $message, $headers)){
                $_SESSION["contact"] = "submit";   
                //echo "a";
            }
            else{
                $_SESSION["contact"] = "fail"; 	 	
                //echo "b";
            }
        }
    }
    else{
        $_SESSION["contact"] = "notset"; 
        //echo "c";
    }

   header("Location: ../contactus.php");
   exit();
?>