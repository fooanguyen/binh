<?php
    session_start();
    //echo  $_SESSION["pageupload"] ;
    if(!isset($_SESSION["logged-in"])){
        header("Location: ./index.php");
        exit();
    }

    require_once(realpath(dirname(__FILE__)) . "/includes/header.php");
    require_once(realpath(dirname(__FILE__)) . "/includes/banner.php");
    require_once(realpath(dirname(__FILE__)) . "/includes/main_menu.php");
    $upload_novalash = htmlspecialchars("./includes/upload.php");

    if(!isset($_SESSION["upload2"]) || $_SESSION["upload2"] == "nofile"){
        echo "No file selected.";
        unset($_SESSION["upload2"]);
    }
    else if($_SESSION["upload2"] == "success"){
       // echo "Upload Successful.";
       echo 	"<script>
                    $(document).ready(function () {
                        $('#uploaded2').modal('show');
                    });
                </script>";	       
        unset($_SESSION["upload2"]);
    }
    if($_SESSION["upload2"] == "limit"){
        //echo "Exceed size limit.";
        echo 	"<script>
                    $(document).ready(function () {
                        $('#limit2').modal('show');
                    });
                </script>";	 
        unset($_SESSION["upload2"]);
    }
    if($_SESSION["upload2"] == "wrong"){
        //echo "Unsupported file type.";
        echo 	"<script>
                    $(document).ready(function () {
                        $('#wrong2').modal('show');
                    });
                </script>";	 
        unset($_SESSION["upload2"]);
    }

    $_SESSION["pageupload"] = "novalash";

?>
<div class="upload2"></div>
<div class="container text-center">
    <form class="form-inline justify-content-center mt-8" action="<?php echo $upload_novalash;?>" method="post" enctype="multipart/form-data">
        <label for="upload2">NovaLash Upload</label>
        <div class="form-group col-md-12">
            <input type="file" class="form-control-file" id="upload2" name="upload2[]" multiple="" required>
        </div>

        <div class="form-group col-md-5">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Upload file</button>
        </div>
    </form>

    <div class="modal fade uploaded2" id="uploaded2" tabindex="-1" role="dialog" aria-labelledby="uploaded2" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="uploaded2">Upload Completed!</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
			</div>
	</div>

	<div class="modal fade limit2" id="limit2" tabindex="-1" role="dialog" aria-labelledby="limit2" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="limit2">Failed to send! Please try again.</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
			</div>
	</div>

    <div class="modal fade wrong2" id="wrong2" tabindex="-1" role="dialog" aria-labelledby="wrong2" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="wrong2">Support JPEG,JPG,GIF,PNG type only!</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
			</div>
	</div>
    
</div>

<div class="end-upload"></div>
<?php
	require_once(realpath(dirname(__FILE__)) . "/includes/footer.php");
?> 