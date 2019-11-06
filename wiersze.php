<?php
	session_start();
	if(!isset($_SESSION['isLogged']))
		$_SESSION['isLogged'] = FALSE;
		
	include("header.php");
	include("displayFromDB.php");
?>
<div class="row">
	<div class="col-md-6" style="padding: 5%;">
		<?php displayContent("SELECT * FROM posts ORDER BY post_id DESC"); //zmienić tabele ?>
	</div>
	<?php include("displaySummernote.php") ?>
</div>

<?php include("footer.php") ?>

