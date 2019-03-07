<?php
	session_start();
	require_once(realpath(dirname(__FILE__)) . "/includes/header.php");
	require_once(realpath(dirname(__FILE__)) . "/includes/banner.php");
	require_once(realpath(dirname(__FILE__)) . "/includes/main_menu.php");
	require_once(realpath(dirname(__FILE__)) . "/includes/slider.php");
	require_once(realpath(dirname(__FILE__)) . "/includes/gallery.php");
?>
<script src="js/index.js"></script>
<script src="js/jquery.simplePagination.js"></script>
<?php
	require_once(realpath(dirname(__FILE__)) . "/includes/footer.php");
?> 