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
			displayContent("SELECT * FROM post WHERE id=$pid", $type); 
			displayComments("SELECT * FROM comment WHERE post_id=$pid AND type=$type ORDER BY id DESC", $type);
		?>
	</div>
</div>

<?php include("footer.php"); ?>