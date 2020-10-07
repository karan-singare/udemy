<?php include 'connection/db.php'; ?>
<?php 
if(isset($_SESSION['user_id']))
{
	header("location:profile/index.php");
}


 ?>
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
<!-- === Add Background Video === -->
<video autoplay muted loop id="myvideo">
	<source src="assets/img/video.mp4" type="video/mp4">
</video>

<!-- === NAVBAR  === -->
<?php include 'parts/nav.php'; ?>
<?php if(isset($_SESSION['unutherrized'])): ?>
	<div class="alert alert-danger text-center all-msg">
		<strong><?php echo $_SESSION['unutherrized']; ?></strong>
	</div>
	<?php endif; ?>
	<?php unset($_SESSION['unutherrized']); ?>

<div class="showcase">
<div class="container">
	<div class="row">
		<div class="col-md-8 content">
			
			<?php if(isset($_SESSION['online_user'])): ?>
				<h3>Thank You <span class="online"><?php echo $_SESSION['online_user'] ?></span> See you next time </h3>
				<p><i class="fa fa-thumbs-o-up"></i></p>
			<?php else: ?>
				<h1>Its always free</h1><hr>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A voluptate dignissimos fuga in dolor quia natus porro blanditiis sint provident dolore libero, deleniti eius voluptatem aperiam vitae quos itaque labore!</p>
			<?php endif; ?>
			<?php unset($_SESSION['online_user']); ?>
			
			
		</div><!-- col -->
		<div class="col-md-4 content">
			<div class="signup-cover">
			<div class="card">
				<div class="card-header">
					
				</div><!-- card-header -->
				<div class="card-body">
					<form id="signup_submit">
						<div class="form-group show-progress">
							
						</div>
						<div class="form-group">
							<input type="text" name="name" id="name" class="form-control" placeholder="Enter Name...">
							<div class="name-error error"></div>
						</div><!-- form-group -->
						<div class="form-group">
							<input type="email" name="email" id="email" class="form-control" placeholder="Enter Email...">
							<div class="email-error error"></div>
						</div><!-- form-group -->
						<div class="form-group">
							<input type="password" name="password" id="password" class="form-control" placeholder="Choose Password...">
							<div class="password-error error"></div>
						</div><!-- form-group -->
						<div class="form-group">
							<input type="password" id="confirm" class="form-control" placeholder="Confirm Password...">
							<div class="confirm-error error"></div>
						</div><!-- form-group -->
						<div class="form-group">
							<button type="button" id="submit" class="btn btn-success btn-block form-btn">Create Account</button>
						</div><!-- form-group -->
						<div class="form-group">
							<a href="#" id="login">Already have an account?</a>
						</div>
					</form><!-- form -->
				</div><!-- card-body -->
				<div class="form-icon">
					<div class="label-heading"><h5>Create New Account</h5></div>
				</div>
			</div><!-- card -->
            </div><!-- signup-cover-->
           <div class="login-cover">
           	<div class="card">
				<div class="card-header">
					
				</div><!-- card-header -->
				<div class="card-body">
					<form id="login-submit-form">
						<div class="form-group">
							<div class="login-error error"></div>
						</div>
						<div class="form-group">
							<input type="email" name="login_email" id="login-email" class="form-control" placeholder="Enter Email...">
							<div class="login-email-error error"></div>
						</div><!-- form-group -->
						<div class="form-group">
							<input type="password" name="login_password" id="login-password" class="form-control" placeholder="Choose Password...">
							<div class="login-password-error error"></div>
						</div><!-- form-group -->
						<div class="form-group">
							<button type="button" id="login-submit" class="btn btn-success btn-block form-btn">Login</button>
						</div><!-- form-group -->
						<div class="form-group">
							<a href="#" id="signup">Create New Account?</a>
						</div>
					</form><!-- form -->
				</div><!-- card-body -->
				<div class="form-icon">
					<div class="label-heading"><h5>User Login</h5></div>
				</div>
			</div><!-- card -->
           </div><!-- login-cover-->

		</div><!-- col -->
	</div><!-- row -->
</div><!-- showcase -->
</div><!-- container -->

<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/simple.js"></script>
<script type="text/javascript" src="assets/js/signup.js"></script>
<script type="text/javascript" src="assets/js/login.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		setTimeout(function(){
        $(".all-msg").fadeOut("slow");
		},2000);
	})
</script>
</body>
</html>