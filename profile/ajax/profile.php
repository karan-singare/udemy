<?php include '../../connection/db.php'; ?>
<?php 

function bio(){
	GLOBAL $db;
	if(isset($_GET['bio']) && $_GET['bio'] == 'true'){
		$bio = $_POST['bio'];
		$user_id = $_SESSION['user_id'];
		$Query = $db->prepare("SELECT bio FROM users WHERE id = ?");
		$Query->execute(array($user_id));
		$r = $Query->fetch(PDO::FETCH_OBJ);
		$bio_db = $r->bio;
		if(empty($bio_db)){
			$Insert = $db->prepare("UPDATE users SET bio = ? WHERE id = ?");
			$Insert->execute(array($bio, $user_id));
			if($Insert){
				$_SESSION['bio_success'] = "<i class='fa fa-check-circle'></i> Your Bio is successfully added";
				echo json_encode(array('error' => 'success'));
			} else {
				echo json_encode(array('error' => 'error'));
			}
		} else {
			$Insert = $db->prepare("UPDATE users SET bio = ? WHERE id = ?");
			$Insert->execute(array($bio, $user_id));
			if($Insert){
				$_SESSION['bio_success'] = "<i class='fa fa-check-circle'></i> Your Bio is successfully Updated";
				echo json_encode(array('error' => 'success'));
			} else {
				echo json_encode(array('error' => 'error'));
			}
		}

	}

}
bio();

function add_facebook_account(){
	GLOBAL $db;
	if(isset($_GET['add_facebook']) && $_GET['add_facebook'] == 'true'){
		$facebook_val = $_POST['facebook_val'];
		$user_id = $_SESSION['user_id'];
		$Query = $db->prepare("SELECT facebook FROM users WHERE id = ?");
		$Query->execute(array($user_id));
		$r = $Query->fetch(PDO::FETCH_OBJ);
		$r->facebook;
		if(empty($r->facebook)){
			$Insert = $db->prepare("UPDATE users SET facebook = ? WHERE id = ?");
			$Insert->execute(array($facebook_val, $user_id));
			if($Insert){
				$_SESSION['facebook_success'] = '<i class="fa fa-check-circle"></i> Your Facebook account is successfully added';
				echo json_encode(array('error' => 'success'));
			} else {
				echo json_encode(array('error' => 'error'));
			}
		} else {
			$Insert = $db->prepare("UPDATE users SET facebook = ? WHERE id = ?");
			$Insert->execute(array($facebook_val, $user_id));
			if($Insert){
				$_SESSION['facebook_success'] = '<i class="fa fa-check-circle"></i> Your Facebook account is successfully Updated';
				echo json_encode(array('error' => 'success'));
			} else {
				echo json_encode(array('error' => 'error'));
			}
		}
	}
}

add_facebook_account();

function add_linkedin_account(){
	GLOBAL $db;
	if(isset($_GET['add_linkedin']) && $_GET['add_linkedin'] == 'true'){
		$linkedin_val = $_POST['linkedin_val'];
		$user_id = $_SESSION['user_id'];
		$Query = $db->prepare("SELECT linkedin FROM users WHERE id = ?");
		$Query->execute(array($user_id));
		$r = $Query->fetch(PDO::FETCH_OBJ);
		$r->linkedin;
		if(empty($r->linkedin)){
			$Insert = $db->prepare("UPDATE users SET linkedin = ? WHERE id = ?");
			$Insert->execute(array($linkedin_val, $user_id));
			if($Insert){
				$_SESSION['linkedin_success'] = '<i class="fa fa-check-circle"></i> Your Linkedin account is successfully added';
				echo json_encode(array('error' => 'success'));
			} else {
				echo json_encode(array('error' => 'error'));
			}
		} else {
			$Insert = $db->prepare("UPDATE users SET linkedin = ? WHERE id = ?");
			$Insert->execute(array($linkedin_val, $user_id));
			if($Insert){
				$_SESSION['linkedin_success'] = '<i class="fa fa-check-circle"></i> Your Linkedin account is successfully Updated';
				echo json_encode(array('error' => 'success'));
			} else {
				echo json_encode(array('error' => 'error'));
			}
		}
	}
}

add_linkedin_account();

function change_password(){
	GLOBAL $db;
	if(isset($_GET['password']) && $_GET['password'] == 'true'){
		$current_password = $_POST['current_password'];
		$new_password     = $_POST['new_password'];
		$user_id          = $_SESSION['user_id'];
		$Query = $db->prepare("SELECT password FROM users WHERE id = ?");
		$Query->execute(array($user_id));
		$r = $Query->fetch(PDO::FETCH_OBJ);
		$db_password = $r->password;
		if(password_verify($current_password, $db_password)){
         $password_reg = "/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9]{8,}$/";
         if(preg_match($password_reg, $new_password )){
         	$new_pwd = password_hash($new_password, PASSWORD_DEFAULT);
         $Update_Password = $db->prepare("UPDATE users SET password = ? WHERE id = ?");
         $Update_Password->execute(array($new_pwd, $user_id));
         if($Update_Password){
         	$_SESSION['password_success'] = '<i class="fa fa-check-circle"></i> Your Password is succesfully updated!';
         	echo json_encode(array('error' => 'success'));

         }
         } else {
         	echo json_encode(array('error' => 'pattren', 'msg' => '8 characters or longer. Combine upper and lowercase letters and numbers'));
         }
		} else {
			echo json_encode(array('error' => 'current_password_wrong', 'msg' => 'Current Paassword is wrong'));
		}
	}

}
change_password();

function update_name(){
	GLOBAL $db;
	if(isset($_GET['change_name']) && $_GET['change_name'] == 'true'){
		$name = $_POST['change_name'];
		$name_reg = "/^[a-zA-Z ]+$/";
		$user_id = $_SESSION['user_id'];
		if(preg_match($name_reg, $name)){
       $Query = $db->prepare("UPDATE users SET name = ? WHERE id = ?");
       $Query->execute(array($name, $user_id));
       if($Query){
       	$_SESSION['name_update'] = "<i class='fa fa-check-circle'></i> Your name is successfully updated";
       	echo json_encode(array('error' => 'success'));
       }
		} else {

			echo json_encode(array('error' => 'pattren', 'msg' => 'Name will be only character'));
		}
	}
}
update_name();

function add_address(){
	GLOBAL $db;
	if(isset($_GET['address']) && $_GET['address'] == 'true'){
		$address = $_POST['add_address'];
		$user_id = $_SESSION['user_id'];
		$Fetch_Query = $db->prepare("SELECT address FROM users WHERE id = ?");
		$Fetch_Query->execute(array($user_id));
		$Fetch_r = $Fetch_Query->fetch(PDO::FETCH_OBJ);
		$address_db = $Fetch_r->address;
		if(empty($address_db)){
        $Query = $db->prepare("UPDATE users SET address = ? WHERE id = ?");
        $Query->execute(array($address, $user_id));
        if($Query){
        	$_SESSION['address_success'] = "<i class='fa fa-check-circle'></i> Your address is successfully Added";
        	echo json_encode(array("error" => 'success'));
        }
		} else {
         $Query = $db->prepare("UPDATE users SET address = ? WHERE id = ?");
        $Query->execute(array($address, $user_id));
        if($Query){
        	$_SESSION['address_success'] = "<i class='fa fa-check-circle'></i> Your address is successfully Updated";
        	echo json_encode(array("error" => 'success'));
        }
		}
	}
}
add_address();





 ?>