<?php
session_start();


if(isset($_SESSION['username']))
{
    header("location: Explorepage.php");
    exit;
}
require_once "config.php";

$username = $password = "";
$err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter username + password";
		// alert($err);
    }
    else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


if(empty($err))
{
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;
    
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            session_start();
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;
                            header("location: Explorepage.php");                           
                        }
						else
						{
						?>
						<!-- <div class="alert alert-primary" role="alert">
  This is a primary alert—check it out!
</div> -->
<script>alert('hi');</script>
<?php

						}

                    }
                }
    }
}    
}

?>

<!doctype html>
<html lang="en">

<head>
	<title>SignIn Page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="style1.css">
</head>
<style>
	* {
		margin: 0;
		padding: 0;
	}

	body {
		background: black;
		/* background-size: cover; */
	}

	.button-clr {
		background-color: #ba0001;
		color: white;
		font-weight: bold;
		font-size: 18px;
	}
.main-border{
	border-radius: 50px;
}

</style>

<body>
	<section class="ftco-section">
		<div class="container main-border ">
			<div class="row justify-content-center main">
				<div class="col-md-12 col-lg-16 ">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(popcorn.jfif);">
						</div>
						<div class="login-wrap p-4 p-md-5">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">LOGIN</h3>
								</div>

							</div>
							<form action="signin.php" class="signin-form" method="post"> 
								<div class="form-group mb-3 ">
									<label class="label " for="name">Username</label>
									<input type="text" class="form-control main " placeholder="Username" name="username" required>
								</div>
								<div class="form-group mb-3">
									<label class="label" for="password">Password</label>
									<input type="password" class="form-control" placeholder="Password" name="password" required>
								</div>
								<div class="form-group">
									<button type="submit" class="form-control btn button-clr rounded submit px-3">Sign
										In</button>
								</div>


							</form>
							<p class="text-center">Not registered? <a data-toggle="tab" href="signup.php">Sign Up</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/bootstrap.min.js"></script>


</body>

</html>