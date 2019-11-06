<?php
	session_start();
	if(!isset($_SESSION['isLogged']))
		$_SESSION['isLogged'] = FALSE;
		
	include("header.php");
	include("displayDataFromDB.php");
?>
<div class="row">
	<div class="col-md-6" style="padding: 5%;">
		<?php displayContent("SELECT * FROM puzzle ORDER BY puzzle_id DESC", "puzzle_id", "puzzle_date"); ?>
	</div>
	<div class="col-md-6 form-group" style="padding: 5%;">
		<form action="post.php" method="post" enctype="multipart/form-data">
			<?php include("displaySummernote.php") ?>
		</form>
	</div>
</div>

<?php include("footer.php") ?>

