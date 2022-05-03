<?php
session_start();
include_once 'config.php';
if($_SERVER['REQUEST_METHOD']=='POST')
{
    
        $username = $_SESSION['username'];
        $name=$_POST['name'];
        $email_id = $_POST['email_id'];
        $phone=$_POST['phone'];
        $description = $_POST['description'];
        $sql= "INSERT INTO `contactus` (`username`,`name`, `email_id`,`description`, `phone`) VALUES ('$username','$name','$email_id','$description', '$phone')";
        mysqli_query($conn, $sql);
        echo '<script>alert("You have successfully contacted the team!!")</script>';      
}   

$error = '';
$name = '';
$email = '';
$phone = '';
$desc= '';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"]))
{
 if(empty($_POST["name"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
 }
 else
 {
  $name = clean_text($_POST["name"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$name))
  {
   $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
  }
 }
 if(empty($_POST["email"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
 }
 else
 {
  $email = clean_text($_POST["email"]);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
   $error .= '<p><label class="text-danger">Invalid email format</label></p>';
  }
 }
 if(empty($_POST["phone"]))
 {
  $error .= '<p><label class="text-danger">Subject is required</label></p>';
 }
 else
 {
  $subject = clean_text($_POST["phone"]);
 }
 if(empty($_POST["desc"]))
 {
  $error .= '<p><label class="text-danger">Message is required</label></p>';
 }
 else
 {
  $message = clean_text($_POST["desc"]);
 }

 if($error == '')
 {
  $file_open = fopen("contact_data.csv", "a");
  $no_rows = count(file("contact_data.csv"));
  if($no_rows > 1)
  {
   $no_rows = ($no_rows - 1) + 1;
  }
  $form_data = array(
   'sr_no'  => $no_rows,
   'name'  => $name,
   'email'  => $email,
   'phone' => $phone,
   'desc' => $desc
  );
  fputcsv($file_open, $form_data);
  $error = '<label class="text-success">Thank you for contacting us</label>';
  $name = '';
  $email = '';
  $phone = '';
  $desc = '';
 }
}
?>