<?php
	session_start();
	if(!isset($_SESSION['registered']))
	{
		//header('Location: index.php');
		//exit();
	}
	else
	{
		unset($_SESSION['registered']);
	}
	if(isset($_SESSION['fr_login'])) unset($_SESSION['fr_login']);
	if(isset($_SESSION['fr_email'])) unset($_SESSION['fr_email']);
	if(isset($_SESSION['fr_password1'])) unset($_SESSION['fr_password1']);
	if(isset($_SESSION['fr_password2'])) unset($_SESSION['fr_password2']);
	if(isset($_SESSION['fr_regulations'])) unset($_SESSION['fr_regulations']);
	if(isset($_SESSION['e_login'])) unset($_SESSION['e_login']);
	if(isset($_SESSION['e_email'])) unset($_SESSION['e_email']);
	if(isset($_SESSION['e_password'])) unset($_SESSION['e_password']);
	if(isset($_SESSION['e_regulations'])) unset($_SESSION['e_regulations']);
	if(isset($_SESSION['e_bot'])) unset($_SESSION['e_bot']);

	include("header.php")
?>

<div class="alert alert-success welcome m-0" role="alert">
	<h4 class="alert-heading text-center">Gratulacje!</h4>
	<p class="text-center">Możesz już zalogować się na swoje konto.</p>
</div>

<?php include("footer.php") ?>