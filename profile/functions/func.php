<?php include '../connection/db.php'; ?>
<?php 
function links(){
	GLOBAL $db;
	$user_id = $_SESSION['user_id'];
	$Query = $db->prepare("SELECT * FROM users WHERE id = ?");
	$Query->execute(array($user_id));
	$r = $Query->fetch(PDO::FETCH_OBJ);

	if(empty($r->image)){
		$photo = "<img src='img/no_img.png' class='user_img'>";
		$photo_link = "<a href='add_photo.php'>Update Photo <i class='fa fa-pencil'></i>'</a>";
	}else{
		$photo = "<img src='img/$r->image' class='user_img'>";
		$photo_link = "<a href='add_photo.php'>Update Photo <i class='fa fa-pencil'></i></a>";
	}

	if(empty($r->bio)){
        $bio = "<a href='#' data-target='#bio' data-toggle='modal'>Add Bio <i class='fa fa-plus-circle'></i></a>";
	}else{
		$bio = "<a href='' data-target='#bio' data-toggle='modal'>Update Bio <i class='fa fa-pencil'></i></a>";
	}
	if(empty($r->address)){
		$address =  "<a href='address.php'>Add Address <i class='fa fa-plus-circle'></i></a>";
	} else {
		$address =  "<a href='address.php'>Update Address <i class='fa fa-pencil'></i></a>";
	}
	if(empty($r->facebook)){
		$facebook = "<a href='#' data-target='#facebook' data-toggle='modal'>Add Facebook <i class='fa fa-plus-circle'></i></a>";
	} else {
		$facebook = "<a href='#' data-target='#facebook' data-toggle='modal'>Update Facebook <i class='fa fa-pencil'></i></a>";
	}
	if(empty($r->linkedin)){
		$linkedin = "<a href='#' data-target='#linkedin' data-toggle='modal'>Add Linkedin <i class='fa fa-plus-circle'></i></a>";
	} else {
		$linkedin = "<a href='#' data-target='#linkedin' data-toggle='modal'>Update Linkedin <i class='fa fa-pencil'></i></a>";
	}

	echo "<ul class='list-group'>
	        $photo
	      <li class='list-group-item first-li'>$photo_link</li>
         <li class='list-group-item'>$bio</li>
         <li class='list-group-item'>$address</li>
         <li class='list-group-item'>$facebook</li>
         <li class='list-group-item'>$linkedin</li>
         <li class='list-group-item'><a href='#' data-target='#update_password' data-toggle='modal'>Update Password <i class='fa fa-pencil'></i></a></li>
         <li class='list-group-item'><a href='#' data-target='#update_name' data-toggle='modal'>Update Name <i class='fa fa-pencil'></i></a></li>
	</ul>";
}

function update_picture(){
   GLOBAL $db;
   $user_id = $_SESSION['user_id'];
   if(isset($_POST['picture'])){
   	$img_name = $_FILES['file']['name'];
   	$tmp_name = $_FILES['file']['tmp_name'];
   	$store    = "img/";
   	$extensions = array('png', 'PNG', 'jpg', 'jpeg');
   	$split = explode(".", $img_name);
   	$img_exten = $split[1];
   	if(in_array($img_exten, $extensions)){
   		move_uploaded_file($tmp_name, "$store/$img_name");
   		$Query = $db->prepare("UPDATE users SET image = ? WHERE id = ?");
   		$Query->execute(array($img_name, $user_id));
   		if($Query){
   			$_SESSION['image_success'] = "<i class='fa fa-check-circle'></i> Your image is successfully updated!";
   			header("location:index.php");
   		}else{
   			echo "sorry query not work";
   		}

   	}else{
   		echo "<div class='text-danger'>Invalid Image Extension!</div>";
   	}

   }
}

function user_info(){
	GLOBAL $db;
	$user_id = $_SESSION['user_id'];
	$Query = $db->prepare("SELECT * FROM users WHERE id = ?");
	$Query->execute(array($user_id));
	$r = $Query->fetch(PDO::FETCH_OBJ);
	$_SESSION['online_user'] = $r->name;
	$name = ucwords($r->name);
	if(empty($r->address)){
		$address = "<a href='address.php'>Add Address</a>";
	} else {
		$address = $r->address;
	}
	if(empty($r->bio)){
		$bio = "<a href='#' data-target='#bio' data-toggle='modal'>Add Bio <i class='fa fa-plus-circle'></i></a>";
	} else {
		$bio = $r->bio;
	} 
	if(empty($r->facebook)){
		$facebook = "<a href='#' data-target='#facebook' data-toggle='modal'>Add Facebook <i class='fa fa-plus-circle'></i></a>";
	} else {
		$facebook = "<a href='$r->facebook' target='_blank'><i class='fa fa-facebook'></i> Connected</a>";
	} 
	if(empty($r->linkedin)) {
		$linkedin = "<a href='#' data-target='#linkedin' data-toggle='modal'>Add Linkedin <i class='fa fa-plus-circle'></i></a>";
	} else {
		$linkedin = "<a href='$r->linkedin' target='_blank'><i class='fa fa-linkedin'></i> Connected</a>";
	}



	echo "<div class='row user-info'>
          <div class='col-md-3'>
           <span>Name</span>
          </div>
          <div class='col-md-9'>$name</div>

	</div>
    <div class='row user-info'>
          <div class='col-md-3'>
           <span>Address</span>
          </div>
          <div class='col-md-9'>$address</div>

	</div>

	<div class='row user-info'>
          <div class='col-md-3'>
           <span>Biography</span>
          </div>
          <div class='col-md-9'>$bio</div>

	</div>

	<div class='row user-info'>
          <div class='col-md-3'>
           <span>Facebook</span>
          </div>
          <div class='col-md-9'>$facebook</div>

	</div>

	<div class='row user-info'>
          <div class='col-md-3'>
           <span>Linkedin</span>
          </div>
          <div class='col-md-9'>$linkedin</div>

	</div>



	";
}

function percentage() {
	GLOBAL $db;
	$user_id = $_SESSION['user_id'];
	$Query = $db->prepare("SELECT * FROM users WHERE id = ?");
	$Query->execute(array($user_id));
	$r = $Query->fetch(PDO::FETCH_OBJ);
	// 12.5
	if(!empty($r->name)){
		$name = 12.5;
	} else {
		$name = 0;
	}
	if(!empty($r->email)) {
		$email = 12.5;
	} else {
		$email = 0;
	}
	if(!empty($r->password)) {
		$password = 12.5;
	} else {
		$password = 0;
	}
	if(!empty($r->image)) {
		$image = 12.5;
	} else {
		$image = 0;
	}
	if(!empty($r->bio)) {
		$bio = 12.5;
	} else {
		$bio = 0;
	} 
	if(!empty($r->facebook)){
		$facebook = 12.5;
	} else {
		$facebook = 0;
	}
	if(!empty($r->linkedin)) {
		$linkedin = 12.5;
	} else {
		$linkedin = 0;
	}
	if(!empty($r->address)) {
		$address = 12.5; 
	} else {
		$address = 0;
	}

	if(!empty($name) && !empty($email) && !empty($password) && !empty($image) && !empty($bio) && !empty($facebook) && !empty($linkedin) && !empty($address)){
		echo $per = "<div class='green-per'><i class='fa fa-check-circle'></i> 100%</div>";
	} else {
        $per = $name + $email + $image + $password + $bio + $facebook + $linkedin + $address;
        $split = explode(".", $per);
        echo "<div class='orange-per'>". $split[0]. " %</div>";


	}
	
}


 ?>