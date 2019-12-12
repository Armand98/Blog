<?php
	session_start();
	if(!isset($_SESSION['isLogged']))
		$_SESSION['isLogged'] = FALSE;
		
	include("header.php");
	include("displayDataFromDB.php");
	include ("displayComments.php")
?>

<div class="row">
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
				exit();
				echo '<script>alert("Nie kombinuj ;)")</script>';
				echo '<script>window.location.replace("http://localhost/blog/index.php")</script>';
			}
			displayContent("SELECT * FROM $table WHERE id=$pid", $type); 
		?>
	</div>
	<div class="col-md-6 d-flex justify-content-center" style="padding: 5%;">
			<?php displayComments("SELECT * FROM comment WHERE post_id=$pid AND type=$type ORDER BY id DESC", $type); ?>
	</div>
</div>

<?php include("footer.php"); ?>