
<?php

$firstName=$_POST['fristName'];
$lastName=$_POST['lastName'];
$email=$_POST['email'];
$password=$_POST['password'];
$conformPassword=$_POST['conformPassword'];
$phone=$_POST['phone'];
$dob=$_POST['dob'];
$session=$_POST['session'];
$fatherName=$_POST['fatherName'];
$fphone=$_POST['fphone'];
$fprofession=$_POST['fprofession'];
$mname=$_POST['mname'];
$mphone=$_POST['mphone'];
$mprofession=$_POST['mprofession'];
$dept=$_POST['dept'];
$bgroup=$_POST['bgroup'];
$region=$_POST['region'];
$gender=$_POST['gender'];
$street=$_POST['street'];
$ps=$_POST['ps'];
$dist=$_POST['dist'];
$zip=$_POST['zip'];

// database connection
$conn =new mysqli('localhost','root','','project');
if($conn->connect_error){
    die('connection fail');
}
else{
    $stmt =$conn->prepare("insert into registration(firstName,lastName,email,password,conformPassword,phone,dob,session,fatherName,fphone,fprofession,mname,mphone,mprofession,dept,bgroup,region,gender,street,ps,dist,zip)
    values(?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?,?,?,?,?)");
    $stmt->bind_param("sssssidssississssssssi", $firstName, $lastName, $email, $password, $conformPassword,$phone,$dob,$session,$fatherName,$fphone,$fprofession,$mname,$mphone,$mprofession,$dept,$bgroup,$region,$gender,$street,$ps,$dist,$zip);
		$execval = $stmt->execute();
		echo $execval;
		header('Location:submited.html');
		$stmt->close();
		$conn->close();
}
?>
