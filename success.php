<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1 shrink-to-fit=no">
	<title>Udemy Signup & Login</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<?php include "parts/nav.php"; ?>
	<div class="container main">
		<div class="row">
			<div class="col-md-12">
				<div class="success-area">
					<?php if(isset($_SESSION['user_name'])): ?>
						<?php echo "<i class='fa fa-check-circle'></i> Hi <strong>". $_SESSION['user_name']. "</strong> Welcome to our website we are glad to see you here Now login <a href='index.php'>Login</a>"; ?>
					<?php endif; ?>
					<?php unset($_SESSION['user_name']); ?>
				</div><!-- success-area -->
			</div><!-- col -->
		</div><!-- row -->
	</div><!-- container -->
</body>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".success-area").fadeOut();
		$(".success-area").fadeIn(5000);
	})
</script>
</html>
