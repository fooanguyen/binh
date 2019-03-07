<?php
    $home = htmlspecialchars("./index.php");
	$services = htmlspecialchars("./services.php");
	$novalash = htmlspecialchars("./novalash.php");
	$contactus= htmlspecialchars("./contactus.php");
	$logout = htmlspecialchars("./includes/logout.php");
	$login = htmlspecialchars("./includes/login.php");
	$upload = htmlspecialchars("./gallery_upload.php");
	$upload2 = htmlspecialchars("./novalash_upload.php");
	$fb_like = htmlspecialchars("https://www.facebook.com/plugins/error/confirm/like?iframe_referer=&kid_directed_site=false&secure=true&plugin=like&return_params=%7B%22href%22%3A%22https%3A%2F%2Fwww.facebook.com%2Fserenitynailspamd%22%2C%22ret%22%3A%22sentry%22%2C%22act%22%3A%22like%22%7D"); 


	$access = "";
	$log = "";
	$modal = "";

	if(isset($_SESSION["logged-in"])){
		$access = "Admin-logout";
		$log = $logout;
		$uploadLink = "<a class='nav-item nav-link text-white' id='upload' href='".$upload."'><i class='fas fa-file-upload'></i>Upload Gallery &emsp;&emsp;&emsp; </a>";
		$uploadLink2 = "<a class='nav-item nav-link text-white' id='upload' href='".$upload2."'><i class='fas fa-file-upload'></i>Upload NovaLash</a>";
	}
	else{
		$access = "Admin-login";
		$log = "#";
		$modal = "modal";
		$uploadLink="";
		$uploadLink2="";

	}
?>
<!--main menu-->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
		 aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
        </button>
        
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-item nav-link text-white" id="home" href="<?php echo $home;?>"><i class="fas fa-home"></i>Home &emsp;&emsp;&emsp;<span class="sr-only">(current)</span></a>
				<a class="nav-item nav-link text-white" id="services" href="<?php echo $services;?>"><i class="fas fa-clipboard-list"></i>Services &emsp;&emsp;&emsp;</a>
				<a class="nav-item nav-link text-white" id="novalash" href="<?php echo $novalash;?>"><i class="fas fa-clipboard-list"></i>NovaLash &emsp;&emsp;&emsp;</a>
				<a class="nav-item nav-link text-white" id="contactus" href="<?php echo $contactus;?>"><i class="fas fa-mobile"></i>Contact Us &emsp;&emsp;&emsp;</a>
				<?php echo $uploadLink;?>
				<?php echo $uploadLink2;?>
			</div>    	

			<div class="navbar-nav ml-auto">
				<a class="nav-item nav-link text-white" data-toggle="<?php echo $modal; ?>" data-target="#login" href="<?php echo $log; ?>"><span><i class="fas fa-sign-in-alt"></i></span><?php echo $access ?>&emsp;&emsp;&emsp;</a>
			</div>

			<div>
				<a class="social-inner icon nav-link text-white" href="<?php echo $fb_like;?>"><i class="fab fa-facebook fa-2x"></i></a>
			</div>
		</div>
</nav>

 <!-- Modal -->
 <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="loginLabel">Log-in</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" action="<?php echo $login;?>" >
						<div class="form-group row">
							<div class="col-sm-12">
								<input class="form-control" id="username" type="text" pattern="[\w\d-]+" placeholder="Username" name="username" autocomplete="username" required>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-sm-12">
								<input class="form-control" id="password" type="password" pattern="[\w\d-]+" placeholder="Password" name="password" autocomplete="password" required>
							</div>
						</div>

						<div class="form-group">
							<button type="submit" name="login" class="btn btn-primary btn-block">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
</div>