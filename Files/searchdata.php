
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="file:///C:/fontawesome-free-5.13.0-web/css/all.css">
	<link rel="stylesheet" type="text/css" href="moviereviews.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css"
		integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css"
		integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Oswald:wght@300&family=Signika+Negative:wght@300&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Lato&family=Oswald:wght@300&family=Signika+Negative:wght@300&display=swap');
*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: 'poppins', sans-serif;
}
section{
	position: relative;
	min-height: 100vh;
	width: 100%;
	background: #070c0d;
	overflow: hidden;

}

.name{
	color: white;
	text-shadow: 2px 2px 5px #f6ad34;
	font-size: 30px;
	text-align: center;
	background-color: #ba0001;
}


/* section:before{
	position: absolute;
	content: '';
	width: 2000px;
	height: 100%;
	bottom: -70%;
	border-radius: 50%;
	background: #3b7cf5;
} */
section .heading{
	display: inline-block;
	position: relative;
	color: #ba0001;
	font-size: 4vw;
	padding: 60px;
	width: 100%;
	text-align: center;
	font-weight: 800;
	font-family: 'Oswald', sans-serif;
}
section .heading:before{
	position: absolute;
	content: '';
	width: 15%;
	height: 7px;
	left: 50%;
	transform: translateX(-50%);
	bottom: 25%;
	background: #f6ad34;
}
section .heading b{
	color: #fff;
}

.name-user{
    display: flex;
    flex-direction: column;

}

.name-user strong{
    color: rgb(250, 250, 255);
    font-size: 1.1rem;
    letter-spacing: 0.5px;
}

.name-user span{
    color: rgb(170, 189, 189);
    font-size: 0.8rem;

}

.reviews{
    color: #f9d71c;
}

.box-top{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.client-comment{
    font-size: 0.9rem;
    color: rgb(219, 204, 204);
}

#review{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    width: 100%;
}

.review-box-container{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    width: 100%;
}

.review-box{
    width: 500px;
    height: 150px;
    background-color: #222;
    padding: 20px;
    margin: 15px;
    cursor: pointer;
}

.body-review{
display: grid;
  place-items: center;
  text-align: center;
  height: 400px;
	width: 700px;
	background: #222;
	margin: auto;
  width: 50%;
 
  padding: 10px;

}

  form header{
	width: 100%;
	font-size: 25px;
	color: #fe7;
	font-weight: 500;
	margin: 5px 0 20px 0;
	text-align: center;
	transition: all 0.2s ease;
  }
  form .textarea{
	height: 100px;
	width: 100%;
	overflow: hidden;
  }
  form .textarea textarea{
	height: 100%;
	width: 100%;
	outline: none;
	color: #eee;
	border: 1px solid #333;
	background: #222;
	padding: 10px;
	font-size: 17px;
	resize: none;
  }
  .textarea textarea:focus{
	border-color: #444;
  }

  form .moviename{
    height: 45px;
	width: 100%;
	overflow: hidden;
  }
  form .moviename textarea{
	height: 100%;
	width: 100%;
	outline: none;
	color: #eee;
	border: 1px solid #333;
	background: #222;
	padding: 10px;
	font-size: 15px;
	resize: none;
  }
  .moviename textarea:focus{
	border-color: #444;
  }

  form .btn{
	height: 45px;
	width: 100%;
	margin: 15px 0;
  }
  form .btn button{
	height: 100%;
	width: 100%;
	border: 1px solid #444;
	outline: none;
	background: #222;
	color: #999;
	font-size: 17px;
	font-weight: 500;
	text-transform: uppercase;
	cursor: pointer;
	transition: all 0.3s ease;
  }
  form .btn button:hover{
	background: #1b1b1b;
  }
</style>
</head>
<body>
  <?php
  include_once 'navreviews.php';
include_once 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){ 
    $name = $_POST['search'];
    $sql="SELECT * FROM `review_table` WHERE moviename='{$name}'";
    $result=mysqli_query($conn,$sql); 
   ?>
<section>
		<div class="heading">ReviewIt</div>
		<div class="name glow"><?php echo $name ?> </div>
    <br><br><br>
  <div id="review">
    <div class="review-box-container">
      <?php
      while($row = mysqli_fetch_assoc($result)){
      ?>
      <div class="review-box">
				<div class="box-top">
					<div class="profile">
						<div class="profile-img">
							<img src="picboy.png" alt="">
						</div>
						<div class="name-user">
							<strong>
								<?php echo $row['username'] ?>
							</strong>
							<span>
								<?php echo $row['moviename']."(Rating: ". $row['rating'].")" ?>
							</span>
						</div>
					</div>
				</div>
				<div class="client-comment">
					<p>
						<?php echo $row['reviews'] ?>
					</p>
				</div>
			</div>
      <?php }
      ?>


    </div>
      </div>
  </section>
    <?php
	
}
?>
<section>
	
	<div style="align-items: center; text-align: center; margin: auto;
	width: 20%; color:white; background-color: #ba0001; height: 50px; padding-top: 10px;">
	<a href="trialreview.php" ><i style="color: white;" class='fas fa-edit'>Write a Review</i></a>
	</div>
</section>


<!-- <button type="submit" style="color:red; margin-left:600px; margin-top:80px; padding:8px; border-radius:15px;">ReviewIt</button> -->
</body>
</html>