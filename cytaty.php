<?php
	session_start();
	if(!isset($_SESSION['isLogged']))
		$_SESSION['isLogged'] = FALSE;
		
	include("header.php");
	include("displayDataFromDB.php");
?>

<div class="row">
	<div class="col-md-6" style="padding: 5%;">
		<?php displayContent("SELECT * FROM quote ORDER BY id DESC", 2); ?>
	</div>
	<div class="col-md-6 form-group" style="padding: 5%;">
		<form action="post.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="table" value="quote">
			<?php include("displaySummernote.php") ?>
		</form>
	</div>
</div>

<?php include("footer.php") ?>

