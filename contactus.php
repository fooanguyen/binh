<?php
	session_start();
	require_once(realpath(dirname(__FILE__)) . "/includes/header.php");
	require_once(realpath(dirname(__FILE__)) . "/includes/banner.php");
	require_once(realpath(dirname(__FILE__)) . "/includes/main_menu.php");
	require_once(realpath(dirname(__FILE__)) . "/includes/address.php");

	$request_process = htmlspecialchars("./includes/request_process.php");

	if($_SESSION["contact"] == "submit"){
		echo 	"<script>
					$(document).ready(function () {
						$('#success').modal('show');
					});
				</script>";	
	}
	else if($_SESSION["contact"] == "fail"){
		echo 	"<script>
					$(document).ready(function () {
						$('#notsuccess').modal('show');
					});
				</script>";	
	}
	
?>
<script src="js/contactus.js"></script>

<div class="container">
	<div class="navbar-nav text-center col-sm-4 mb-3 contact">
		<a class="nav-item nav-link text-white bg-dark rounded" data-toggle="modal" data-target="#contact" href="#"><span><i class="fas fa-sign-in-alt"></i></span>Send A Request/Suggestion</a>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="requestLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="requestLabel">Request/Suggestion</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="post" action="<?php echo $request_process;?>" >
							<div class="form-group row">
								<div class="col-sm-12">
									<input class="form-control" id="fullname" maxlength="70" type="text" pattern="[A-Za-z0-9-_ ]+" placeholder="Fullname (required)" name="fullname" autocomplete="fullname" required>
								</div>
							</div>

							<div class="form-group row">
								<div class="col-sm-12">
									<input class="form-control" id="phone" maxlength="12" type="text" pattern="\d{3}-\d{3}-\d{4}" placeholder="123-456-7890 (required)" name="phone" autocomplete="phone" required>
								</div>
							</div>

							<div class="form-group row">
								<div class="col-sm-12">
									<input class="form-control" id="email" maxlength="70" type="text" pattern="[A-Za-z0-9-_]+@[A-Za-z0-9-_]+.[A-Za-z0-9-_]+" placeholder="Jsmith@gmail.com (required)" name="email" autocomplete="email" required>
								</div>
							</div>

                            <div class="form-group row">
								<div class="col-sm-12">
									<input class="form-control" id="subject" maxlength="70" type="text"  pattern="[A-Za-z0-9-_ ]+" placeholder="Subject (required)" name="subject" autocomplete="subject" required>
								</div>
							</div>


							<div class="form-group row">
								<div class="col-sm-12">
									<textarea class="form-control" id="request" maxlength="70" name="request" rows="4" placeholder="Request/Suggestion"></textarea>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade success" id="success" tabindex="-1" role="dialog" aria-labelledby="success" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="success">Message Sent! Thank You.</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
			</div>
	</div>

	<div class="modal fade notsuccess" id="notsuccess" tabindex="-1" role="dialog" aria-labelledby="notsuccess" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="notsuccess">Failed to send! Please try again.</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
			</div>
	</div>

</div>

<?php
	require_once(realpath(dirname(__FILE__)) . "/includes/footer.php");
?>

