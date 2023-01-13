<?php
$email=$_POST['email'];
$password=$_POST['password'];
$dept=$_POST['dept'];

// database connection
$con =new mysqli('localhost','root','','project');
if($con->connect_error){
    die("connection fail:".$con->connect_error);
}
else{
        $stmt =$con->prepare("select * from registration where email = ?");
        $stmt->bind_param("s",$email);
        
		$stmt->execute();
        $stmt_result =$stmt->get_result();
        if($stmt_result->num_rows> 0){
            $data =$stmt_result->fetch_assoc();
            if($data['password']===$password){
                header('Location:dashboard.html');
            }
            else
            {
               echo "<h2>Invalid email or password</h2> ";
               
            }
        }
        else
        {
            header('location:login.html');
            echo"wrong password";
        }
		
}
?>

