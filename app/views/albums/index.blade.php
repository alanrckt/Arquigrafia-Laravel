<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>	
	</head>
	<body>
		<script type="text/javascript">
		$(document).ready(function() {
			$('.link').each(function() {
				$( this ).click(function(e) {
					e.preventDefault();
					$.ajax({
						url: this.href,
						type: 'DELETE',
						success: function(response) {
						 console.log(response);
						}
					});
				});
			});
		});
		</script>
		<a href="/albums/1" class="link">link</a>
		<a href="/albums/2" class="link">link</a>
		<a href="/albums/3" class="link">link</a>
	</body>
</html>
