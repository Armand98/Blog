<?php
    session_start();
	if(!isset($_SESSION['isLogged']))
		$_SESSION['isLogged'] = FALSE;
		
	include("header.php");
	include("displayDataFromDB.php");
?>

<div class="row flex-column-reverse flex-md-row">
	<div class="col-md-6" style="padding: 5%;">
        <?php 
			$pid = $_GET['pid'];
			$type = $_GET['type'];

			if($type == 1) {
				$table = "post";
			} else if ($type == 2) {
				$table = "quote";
			} else if ($type == 3) {
				$table = "puzzle";
			} else {
				echo '<script>alert("Nie kombinuj ;)")</script>';
				echo '<script>window.location.replace("http://localhost/blog/index.php")</script>';
			}
            displayContent("SELECT * FROM $table WHERE id=$pid", $type);
		?>
	</div>
	<div class="col-md-6" style="padding: 5%;">
		<div class="form-group d-flex justify-content-center">
			<form action=<?php echo"edit_post.php?pid=$pid&type=$type"?> method="post" enctype="multipart/form-data">
				<input type="hidden" name="table" value="post">
				<?php include("displaySummernote.php") ?>
			</form>
		</div>
	</div>
</div>

<?php include("footer.php"); ?>

<script>
	$(".summernoteTitle").val($(".postTitle").find("a").text());
    $("#summernote").summernote("code", $(".postContent").first("p").contents());
</script>