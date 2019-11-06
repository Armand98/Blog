<footer id="sticky-footer" class="py-4 bg-dark text-white-50">
		<div class="container-fluid padding">
			<div class="row text-center">
				<div class="col-md-12">
					<hr class="light">
					<h5>Kontakt</h5>
					<hr class="light">
					<p>e-mail: pajorarmand@gmail.com</p>
				</div>
				<div class="col-12">
					<hr class="light-100">
					<h5>&copy; Armand Pajor</h5>
				</div>
			</div>
		</div>
	</footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
	<script src="scripts/summernote-pl-PL.js"></script>
	<script>
		$('#summernote').summernote({
			placeholder: 'Treść',
			tabsize: 2,
			height: 300,
			minHeight: 100,
			maxHeight: 500,
			focus: true,
			lang: 'pl-PL',
			toolbar: [
				['style', ['bold', 'italic', 'underline', 'clear']],
				['fontsize', ['fontsize']],
				['color', ['color']],
				['para', ['ul', 'ol', 'paragraph']],
				['height', ['height']]
			],
		});
	</script>
</body>
</html>
