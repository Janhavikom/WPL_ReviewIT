<?php
require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; 
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);


// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 5){
    $password_err = "Password cannot be less than 5 characters";
}
else{
    $password = trim($_POST['password']);
}

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
}


// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
{
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

        // Set these parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: signin.php");
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}

?>


<!doctype html>
<html lang="en">

<head>
	<title>SignUp Page</title>
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

.main::placeholder {
  color: red;
  opacity: 1; /
}
</style>

<body>
	<section class="ftco-section">
		<div class="container main-border ">
			<div class="row justify-content-center ">
				<div class="col-md-12 col-lg-16 ">
					<div class="wrap d-lg-flex">
						<div class="img" style="background-image: url(popcorn.jfif);">
						</div>
						<div class="login-wrap p-4 p-md-5">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">REGISTER HERE</h3>
								</div>

							</div>
							<form action="signup.php" class="signin-form" method = "post">
								<div class="form-group mb-3 ">
									<label class="label " for="name">Username</label>
									<input type="text" class="form-control main " placeholder="Username" name="username" required>
								</div>
								<div class="form-group mb-3">
									<label class="label" for="password">Password</label>
									<input type="password" class="form-control" placeholder="Password" name="password" required>
								</div>
                                <div class="form-group mb-3">
									<label class="label" for="password">Confirm Password</label>
									<input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" required>
								</div>
								<div class="form-group">
									<button type="submit" class="form-control btn button-clr rounded submit px-3">Sign
										Up</button>
								</div>


							</form>
							<p class="text-center">Already have an account? <a data-toggle="tab" href="signin.php">Sign In </a></p>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/bootstrap.min.js"></script>


</body>

</html>