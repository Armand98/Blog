<?php
	session_start();
	if(!isset($_SESSION['isLogged']))
		$_SESSION['isLogged'] = FALSE;
		
	include("header.php");
	include("displayDataFromDB.php");
?>

<div class="row flex-column-reverse flex-md-row">
	<div class="col-md-6" style="padding: 5%;">
		<?php displayContent("SELECT * FROM quote ORDER BY id DESC", 2); ?>
	</div>
	<div class="col-md-6" style="padding: 5%;">
		<div class="form-group d-flex justify-content-center">
			<form action="post.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="table" value="quote">
				<?php include("displaySummernote.php") ?>
			</form>
		</div>
	</div>
</div>

<?php include("footer.php") ?>
