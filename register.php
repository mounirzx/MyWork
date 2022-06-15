<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<div class="container">
<form action="" method="post">
    Name: <input class="form-control"type="text" name="name"required>
    <br>
    Age: <input class="form-control" type="date" name="age"required>
    <br>
    Email: <input class="form-control" type="email" name="email"required>
    <br>
    Password: <input class="form-control" type="password" name="password"required>
    <br>
    <button class="btn btn-success" name="register" type="submit">Register</button>
</form>
</div>
 <?php
$username="root";
$password="";
$db = new PDO("mysql:host=localhost; dbname=mywork;",$username,$password);


if(isset($_POST['register'])){

$checkEmail=$db->prepare("SELECT * FROM users WHERE email = :email");
$email= $_POST['email'];
$checkEmail->bindParam("email",$email);
$checkEmail->execute();
    
    if($checkEmail->rowCount()>0){
        echo'</div>
        <div class="alert alert-danger" role="alert">
        Email Address is Already Registered!
        </div>';
    }else{
         $name=$_POST["name"];
         $password=$_POST["password"];
         $email=$_POST["email"];
         $age=$_POST["age"];

         $addUser = $db->prepare("INSERT INTO users (ID, name, age, email, password, created_at,security_code) VALUES(NULL, :name, :age, :email,:password,  current_timestamp(),:security_code)");

            $addUser->bindParam("name",$name);
            $addUser->bindParam("age",$age);
            $addUser->bindParam("email",$email);
            $addUser->bindParam("password",$password);
            $addUser->bindParam("security_code",$security_code);
            $security_code=md5(date("h:i:s"));
            if($addUser->execute()){
        echo'<div class="alert alert-success" role="alert">
        Your account has been created
      </div>';
      require_once "mail.php";
      $mail->addAddress($email, $name); 
      $mail->Subject="Validation Code";
      $mail->Body="<h1>thank you for regestring to our website</h1>"."<div>Validation link:"."<div>"."<a href='http://localhost/MyWork/active.php?code=".$security_code."'>"."http://localhost/MyWork/active.php"."?code=".$security_code."</a>";
        
        $mail->setFrom('mounir2013b@gmail.com', 'MyWork');
        $mail->send();
    }else{
       echo' <div class="alert alert-danger" role="alert">
        error try again!
        </div>';
    }
    }

}
?>