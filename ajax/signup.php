<?php
include '../connection/db.php';
function check_email(){
  GLOBAL $db;
  if(isset($_POST['check_email'])){
  	$email = $_POST['check_email'];
  	$Query = $db->prepare("SELECT email FROM users WHERE email = ?");
  	$Query->execute(array($email));
  	if($Query->rowCount() == 0){
    echo json_encode(array('error' => 'email_success'));
  	}else{
    echo json_encode(array('error' => 'email_fail', 'message' => 'Sorry this email is already exist'));
  	}
  }
}//close check email method
check_email();

function singup_submit(){
  GLOBAL $db;
  if(isset($_GET['signup']) && $_GET['signup'] == 'true')
  {
   $name     = $_POST['name'];
   $email    = $_POST['email'];
   $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
   $Query    = $db->prepare("INSERT INTO users (name, email, password) VALUES (?,?,?)");
   $Query->execute([$name, $email, $password]);
   if($Query){
    $_SESSION['user_name'] = $name;
    echo json_encode(['error' => 'success', 'msg' => 'success.php']);
   }

  }
}
singup_submit();

 ?>

<?php
    $name     = "karan";
    $email    = "karan@mail.com";
    $password = "Karan123";
    $password = password_hash($password, PASSWORD_DEFAULT);
    // $Query    = $db->prepare("INSERT INTO users (name, email, password) VALUES (?,?,?)");
    // $Query->execute([$name, $email, $password]);

    try {
        $Query    = $db->prepare("INSERT INTO users (name, email, password) VALUES (?,?,?)");
        $Query->execute([$name, $email, $password]);
    } catch (PDOException $e) {
        // echo "Error: " . $e->getMessage();
        var_dump($e);
    }


 ?>
