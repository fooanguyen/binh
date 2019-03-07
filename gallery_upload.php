<?php
    session_start();

    if(!isset($_SESSION["logged-in"])){
        header("Location: ./index.php");
        exit();
    }

    require_once(realpath(dirname(__FILE__)) . "/includes/header.php");
    require_once(realpath(dirname(__FILE__)) . "/includes/banner.php");
    require_once(realpath(dirname(__FILE__)) . "/includes/main_menu.php");
    $upload_img = htmlspecialchars("./includes/upload.php");

    if(!isset($_SESSION["upload"]) || $_SESSION["upload"] == "nofile"){
        echo "No file selected.";
        unset($_SESSION["upload"]);
    }
    else if($_SESSION["upload"] == "success"){
       // echo "Upload Successful.";
       echo 	"<script>
                    $(document).ready(function () {
                        $('#uploaded').modal('show');
                    });
                </script>";	       
        unset($_SESSION["upload"]);
    }
    if($_SESSION["upload"] == "limit"){
        //echo "Exceed size limit.";
        echo 	"<script>
                    $(document).ready(function () {
                        $('#limit').modal('show');
                    });
                </script>";	 
        unset($_SESSION["upload"]);
    }
    if($_SESSION["upload"] == "wrong"){
        //echo "Unsupported file type.";
        echo 	"<script>
                    $(document).ready(function () {
                        $('#wrong').modal('show');
                    });
                </script>";	 
        unset($_SESSION["upload"]);
    }

    $_SESSION["pageupload"] = "gallery";

?>
<div class="upload"></div>
<div class="container text-center">
    <form class="form-inline justify-content-center mt-8" action="<?php echo $upload_img;?>" method="post" enctype="multipart/form-data">
        <label for="upload">Gallery Upload</label>

        <div class="form-group col-md-12">
            <input type="file" class="form-control-file" id="upload" name="upload[]" multiple="" required>
        </div>

        <div class="form-group col-md-5">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Upload file</button>
        </div>
    </form>

    <div class="modal fade uploaded" id="uploaded" tabindex="-1" role="dialog" aria-labelledby="uploaded" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="uploaded">Upload Completed!</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
			</div>
	</div>

	<div class="modal fade limit" id="limit" tabindex="-1" role="dialog" aria-labelledby="limit" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="limit">Failed to send! Please try again.</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
			</div>
	</div>

    <div class="modal fade wrong" id="wrong" tabindex="-1" role="dialog" aria-labelledby="wrong" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="wrong">Support JPEG,JPG,GIF,PNG type only!</h5>
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