<?php
//index.php

$error = '';
$name = '';
$email = '';
// $phone = '';
$desc = '';

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
//  if(empty($_POST["phone"]))
//  {
//   $error .= '<p><label class="text-danger">Subject is required</label></p>';
//  }
//  else
//  {
//   $subject = clean_text($_POST["phone"]);
//  }
 if(empty($_POST["desc"]))
 {
  $error .= '<p><label class="text-danger">Message is required</label></p>';
 }
 else
 {
  $desc = clean_text($_POST["desc"]);
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
  //  'phone' => $phone,
   'desc' => $desc
  );
  fputcsv($file_open, $form_data);
  $error = '<label class="text-danger">Thank you for contacting us</label>';
  $name = '';
  $email = '';
  // $phone = '';
  $desc = '';
 }
}

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Contact Us</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
 </head>
 <style>
   @import url('https://fonts.googleapis.com/css2?family=Berkshire+Swash&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap');

   body{
    background-color: #10052b;
  }
  .contact-section {
    text-align: center;
    color: #ec59dc;
    font-weight: bold;
    font-family: 'Oswald', sans-serif;
    font-size: 7vh;
  }
  .border{
    width: 200px;
    height: 10px;
    background: #32d0f5;
    margin: 20px auto;
  }

  .contact-text{
    color: white;
  }
 </style>
 <body>
  
  <?php
  include_once "_nav.php";
  ?>
  <div class="container">
   
   <br />
   <div class="col-md-6" style="margin:0 auto; float:none;">
    <form method="post">
     <h3 align="center" class="contact-section">Contact Us</h3>
     <div class="border"></div>
     <br />
     <?php echo $error; ?>
     <div class="form-group">
      <label class="contact-text">Enter Name</label>
      <input type="text" name="name" placeholder="Enter Name" class="form-control" value="<?php echo $name; ?>" />
     </div>
     <div class="form-group">
      <label class="contact-text">Enter Email</label>
      <input type="text" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $email; ?>" />
     </div>
     <!-- <div class="form-group">
      <label>Enter Subject</label>
      <input type="text" name="phone" class="form-control" placeholder="Enter Subject" value="<?php echo $phone; ?>" />
     </div> -->
     <div class="form-group">
      <label class="contact-text">Enter Message</label>
      <textarea name="desc" class="form-control" placeholder="Enter Message"><?php echo $desc; ?></textarea>
     </div>
     <div class="form-group" align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Submit" />
     </div>
    </form>
   </div>
  </div>
 </body>
</html>