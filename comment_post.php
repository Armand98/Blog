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
			displayContent("SELECT * FROM posts WHERE post_id=$pid"); 
			displayComments("SELECT * FROM comments WHERE post_id=$pid");
		?>
	</div>
</div>

<?php include("footer.php"); ?>