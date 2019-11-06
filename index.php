<?php
	session_start();
	if(!isset($_SESSION['isLogged']))
		$_SESSION['isLogged'] = FALSE;
		
	include("header.php");

?>

<div class="row justify-content-center bg-dark">
	<div class="col-md-3 d-flex justify-content-center p-5">
		<p class="text-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed malesuada faucibus sem, scelerisque luctus dolor facilisis vel. Suspendisse eget erat vel diam blandit ultricies. Vivamus dui nibh, elementum sed sollicitudin at, convallis eget felis. Maecenas sodales a arcu vitae dictum. Etiam tortor neque, bibendum sed consectetur sed, ornare at dui. Ut in pretium ante. Nunc vel rutrum erat.</p>
	</div>
	<div class="col-md-6">
		<div id="slides" class="carousel slide" data-ride="carousel">
			<ul class="carousel-indicators">
				<li data-target="#slides" data-slide-to="0" class="active"></li>
				<li data-target="#slides" data-slide-to="1"></li>
				<li data-target="#slides" data-slide-to="2"></li>
				<li data-target="#slides" data-slide-to="3"></li>
			</ul>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="img/lawki.jpg" class="d-block w-100">
					<div class="carousel-caption">
						<h1 class="display-2"></h1>
					</div>
				</div>
				<div class="carousel-item">
					<img src="img/park.jpg" class="d-block w-100">
					<div class="carousel-caption">
					<h1 class="display-2"></h1>
					</div>
				</div>
				<div class="carousel-item">
					<img src="img/mostek.jpg" class="d-block w-100">
					<div class="carousel-caption">
					<h1 class="display-2"></h1>
					</div>
				</div>
				<div class="carousel-item">
					<img src="img/alejka.jpg" class="d-block w-100">
					<div class="carousel-caption">
					<h1 class="display-2"></h1>
					</div>
				</div>
				<a class="carousel-control-prev" href="#slides" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#slides" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
	<div class="col-md-3 d-flex justify-content-center p-5">
		<p class="text-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed malesuada faucibus sem, scelerisque luctus dolor facilisis vel. Suspendisse eget erat vel diam blandit ultricies. Vivamus dui nibh, elementum sed sollicitudin at, convallis eget felis. Maecenas sodales a arcu vitae dictum. Etiam tortor neque, bibendum sed consectetur sed, ornare at dui. Ut in pretium ante. Nunc vel rutrum erat.</p>
	</div>
</div>

<?php include("footer.php") ?>

