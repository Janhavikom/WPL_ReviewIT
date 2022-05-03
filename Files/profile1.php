<?php
    session_start();
    include_once 'config.php';   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile1.css">
    <title>Profile</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"> -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@200;300;400&family=Nunito&family=Oswald:wght@200;400&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@300&family=Pacifico&family=Poppins:wght@300&display=swap');
    .headings{
        color: white;
    }

    
			.review-box {
				width: 810px;
				background-color: #222;
				padding-left:20px;
				margin: 15px;
                height: 130px;
                

				cursor: pointer;
			}

            .box-top {
				display: flex;
				justify-content: space-between;
				align-items: center;
				/* margin-bottom: 20px; */
			}

		

			.profile {
				display: flex;
				align-items: center;
			}

			.name-user {
				display: flex;
				flex-direction: column;

			}

			.name-user strong {
				color: rgb(250, 250, 255);
				font-size: 1.1rem;
				letter-spacing: 0.5px;
			}

			.name-user span {
				color: rgb(170, 189, 189);
				font-size: 0.8rem;

			}

			.reviews {
				color: #f9d71c;
			}

			
</style>
    
</head>
<body>



    <div id="root">
    <?php include_once '_nav.php'?>
        <!-- <a href="#" class="logout"><img src="./switch.png" alt="Logout"></a> -->
        <div class="container">
     
            <div class="sidebar">
                <div class="user">
                <?php
						include_once('config.php');
                        $currrentUser = $_SESSION['username'];
    //query to fetch profile picture
    $query = "SELECT * FROM users WHERE username='$currrentUser' ";
                        $result = mysqli_fetch_assoc(mysqli_query($conn, $query));
                        // $fullname=$_POST['fullname'];

                        // $Newbio = $result['aboutme'];
                        // $_SESSION['aboutme'] = $Newbio;
						
						?>
                        <!-- <img src="img/  echo $userImage; ?>" width="100" alt="profile picture" class="profile-img"> -->
                        <img src="picboy.png" alt="" class="profile-img" width="100">
                    <h3 class="profile-name"><?php echo $_SESSION['username']?></h3>
                    <!-- <p class="title">Web developer</p> -->
  

       <!-- <p class="title">echo $row['fullname'] </p> -->
       
       </div>
               <br><br>
               
                
            </div>


            <div class="main">
                <p style="color: #ec59dc; text-align: center; font-family: 'Oswald', sans-serif; font-size:30px;">My Reviews</p>
               <?php
						include_once('config.php');
                        $name=$_SESSION['username'];
						$sql="SELECT * FROM review_table WHERE username='{$name}'";
						$result=mysqli_query($conn,$sql);
						$num = mysqli_num_rows($result);
                        if ($num >0){
                        while ($row =mysqli_fetch_assoc($result)){
				?>
                <div class="review-box" style="font-family: 'poppins', sans-serif;">
				
					<div class="profile">
						
						<div class="name-user">
                            <br>
							<p style="color: #ba0001; font-weight: bold; font-family: 'poppins', sans-serif; "><?php echo $row['moviename']?></p>
							<p style="color: #32d0f5; font-weight: bold; font-family: 'poppins', sans-serif; ">Rating: <?php echo $row['rating']?></p>
						</div>
					</div>
				
				<div class="client-comment">
					<p style="color: white;  font-family: 'poppins', sans-serif; ">
                        <br>
						<?php echo $row['reviews'] ?>
					</p>
				</div>
			</div>
            
                <?php
                        }}
?>
            </div>
        </div>
    </div>
       <?php
 
 mysqli_close($conn);
?>
                
</body>
</html>