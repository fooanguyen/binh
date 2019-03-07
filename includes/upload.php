<?php
    session_start();
   // print_r($_FILES['upload']);
   //echo (count($_FILES['upload']['name']));
  // print_r ($_FILES['upload']['name']);
  //echo (isset($_FILES['upload']));

    $upload = "";
    $dir = "";
    $loc = "";

    if ($_SESSION["pageupload"] == "gallery"){
        $upload = "upload";
        $dir = "../gallery/";
        $loc = "Location: ../gallery_upload.php";
    }
    
    if ($_SESSION["pageupload"] == "novalash"){
        $upload = "upload2";
        $dir = "../novalash/";
        $loc = "Location: ../novalash_upload.php";
    }

    if(isset($_FILES[$upload])){
        //$_SESSION['upload'] = $_POST['randcheck'];
        $file = $_FILES[$upload];
        $len = count($file['name']);
        //echo "len: ". $len;
       for($i = 0; $i < $len; $i++){
            //File properties:
            $fileName = $file['name'][$i];
            //echo $fileName;
            $tempLocation = $file['tmp_name'][$i];
            $fileSize = $file['size'][$i];
            $fileError = $file['error'][$i];
                //echo $fileError;

            //Figure out what kind of file this is:
            $fileExt = explode('.', $fileName);
            $fileExt = strtolower(end($fileExt));
            //echo $fileExt;
            //Allowed files:
            $allowed = array('jpg', 'png', 'gif', 'jpeg');

            //Check if file is allowed:
            if(in_array($fileExt, $allowed)){

                //Does it return an error ?
                //No:
                if($fileError==0){
                    if($fileExt  == "jpg" || $fileExt == "jpeg"){
                        $src = imagecreatefromjpeg($tempLocation);
                    }
                    else if($fileExt  == "png"){
                        $src = imagecreatefrompng($tempLocation);
                    }
                    else{
                        $src = imagecreatefromgif($tempLocation);
                    }

                    //echo $src;
                    //echo $tempLocation;
    
                    list($width, $height) = getimagesize($tempLocation);
                    $newWidth = 800;
                    $newHeight = ($height/$width) * $newWidth;
                    $temp = imagecreatetruecolor($newWidth, $newHeight);
                    imagecopyresampled($temp, $src, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

                    //echo $temp;
                    
                    $imageFolder = $dir;

                    //Check if exist, otherwise create it!
                    if (!is_dir($imageFolder)) {
                        mkdir($imageFolder, 0777, true); 
                    }

                    //Create new filename:
                    $newName = uniqid('', true) . rand(123456789,987654321). '.' . $fileExt;
                    $uploadDestination = $imageFolder . $newName; 

                    imagejpeg($temp, $uploadDestination, 100);

                    imagedestroy($temp);
                    imagedestroy($src);
       
                   //$_SESSION["upload"] = "success";
                   //header("Location:". htmlentities($_SERVER['PHP_SELF']));
                   //exit();
                   //echo "success-". $i+1;
                   $_SESSION[$upload] = "success";
                }
                //An error occured ?
                else{
                    //$_SESSION["upload"] = "exceed-limit";
                    //header("Location:". htmlentities($_SERVER['PHP_SELF']));
                   // exit();
                   //echo "exceed limit size";
                   $_SESSION[$upload] = "limit";
                }

            }
            //Filetype not allowed!
            else{
               // $_SESSION["upload"] = "not-supported";
               // header("Location:". htmlentities($_SERVER['PHP_SELF']));
               // exit();
               //echo "wrong file type";
               $_SESSION[$upload] = "wrong";
            }
       }
    }
    else{
       //echo "no files";
       $_SESSION[$upload] = "nofile";
    }

    header($loc);
    exit();
?>