<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: Landingpage.php");
}
?>

<!doctype html>
<html lang="en">

<head>
	<title>Explore page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js" integrity="sha256-ugED92WALymbx9ylw12aADWaCrsQysE29DyvnAv5i3w=" crossorigin="anonymous"></script> -->
	<link rel="stylesheet" href="style.css">
	<style>
		
		@import url('https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Oswald:wght@300&family=Signika+Negative:wght@300&display=swap');

		body {
			background-color: #10052b;
		}
		/* spin */
.spinnywheel{
  margin:0;
  padding:100px;
  display:flex;
  /* align-items:center; */
  /* justify-content: center; */
  height:100vh;
  overflow:hidden;
}

.spin-wheel{
  /* main box */
  position: relative;
  width: 500px;
  height: 500px;

}
.spin-container{
  /* box */
  width:500px;
  height:500px;

  border-radius:50%;
  border:15px solid white;
  position: relative;
  overflow: hidden;
  transition: 5s;
}

.spin-container div{
  height:50%;
  width:200px;
  position: absolute;
  clip-path: polygon(100% 0 , 50% 100% , 0 0 );
  transform:translateX(-50%);
  transform-origin:bottom;
  text-align:center;
  display:flex;
  align-items: center;
  justify-content: center;
  font-size:20px;
  font-weight:bold;
  font-family:sans-serif;
  color:#fff;
  left:135px;
}

.spin-container .one{
  cursor: pointer;
  
  background-color: #ba0001;
  left:50%;
}
.spin-container .two{
  
  background-color: black;
  transform: rotate(45deg);
}
.spin-container .three{
  
  background-color: #ba0001;
  transform:rotate(90deg);
}
.spin-container .four{
  
  background-color: black;
  transform: rotate(135deg);
}
.spin-container .five{
 
  background-color: #ba0001;
  transform: rotate(180deg);
}
.spin-container .six{
  
  background-color: black;
  transform: rotate(225deg);
}
.spin-container .seven{
 
  background-color: #ba0001;
  transform: rotate(270deg);
}
.spin-container .eight{
  
  background-color: black;
  transform: rotate(315deg);
}
b{
  transform: translate(-50%, -50%) rotate(-270deg);
  background: none;
  align-items: center;
  justify-content: center;
  text-align: center;
}

.arrow{
  position: absolute;
  top:-15%;
  left:50%;
  transform: translateX(-50%);
  color:#fff;
}

.arrow::before{
  content:"\1F817";
  font-size:50px;
}


#spin{
  position: absolute;
  top:50%;
  left:50%;
  transform:translate(-50%,-50%);
  z-index:10;
  background-color: black;
  text-transform: uppercase;
  border:8px solid #fff;
  font-weight:bold;
  font-size:20px;
  color:white;
  width: 80px;
  height:80px;
  font-family: sans-serif;
  border-radius:50%;
  cursor: pointer;
  outline:none;
  letter-spacing: 1px;
}

.spin-text{
  padding-left: 100px;
  padding-top: 70px;
  color: white;
}
.spin-text-header1{
  
  font-size: 60px;
  font-style: italic;
}

.spin-text-inside{
  font-size: 30px;
  font-style: italic;
  color: #32d0f5;
  font-weight: bold;
 
}
.sub-title{
    margin: 50px 0 20px;
    font-size: 2.2 vh;
    font-weight: 500;
    color: blanchedalmond;
}
.latest-releases{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    grid-gap: 30px;
}

.latest-releases div img{
    width: 100%;
    border-radius: 10px;
}
.latest-releases div{
    position: relative;
    transform: translateX(0);
    transition: all 1s ease-in-out;
}
.latest-releases div span{
    position: absolute;
    top: 10%;
    left: 50%;
    /* transform: translate(-50%, -50%); */
    /* text-align: center; */
    background-color: black;
    color: blanchedalmond;
}

.movie-list-item{
    text-align: center;
    
}
.movie-list-item-title{
    color: blanchedalmond;
    text-align: center;
    font-size: larger;
    padding: 5px 2px;

}

.movie-list-item-button{
    color: white;   
    text-align: center; 
    background-color: #ba0001;
    border-radius: 20px;
    width: 120px;
    height: 35px;
    border: none;
    cursor: pointer;
}
.movie-list-item-button a{
  text-decoration: none;
  color: white;
  background-color: transparent;
}


	</style>
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
</head>

<body>
	<section class="ftco-section">
		<div class="container-fluid px-md-5">
			<div class="row justify-content-between">
				<div class="col-md-8 order-md-last">
					<div class="row">
						<div class="col-md-6 text-center">
							<p class="navbar"
								style="font-size: 38px; font-weight: bold; font-family: 'Oswald', sans-serif; color: #ec59dc">
								ReviewIT</p>
						</div>
						<div class="col-md-6 d-md-flex justify-content-end mb-md-0 mb-3">
							<form action="searchdata.php" action="searchbar.php" method="post" class="searchform order-lg-last">
								<div class="form-group d-flex">
                  
									<input type="text" class="form-control pl-3" placeholder="Search" id="search" name="search" autocomplete="on">
									<button type="submit" placeholder="" class="form-control search"><span
											class="fa fa-search"></span></button>
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>

    <script type="text/javascript">
      $(function(){
        $("#search").autocomplete({
          source: 'searchbar.php',
        });
      });

    </script>
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
			<div class="container-fluid">

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
					aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="fa fa-bars"></span> Menu
				</button>
				<div class="collapse navbar-collapse" id="ftco-nav">
					<ul class="navbar-nav m-auto">
						<li class="nav-item active"><a href="#" class="nav-link" style="font-size: 15px;">Home</a></li>
						<li class="nav-item"><a href="trialreview.php" class="nav-link" style="font-size: 15px;">Review</a></li>
						<li class="nav-item"><a href="trialcontact.php" class="nav-link" style="font-size: 15px;">Contact</a></li>
						<li class="nav-item"><a href="profile1.php" class="nav-link" style="font-size: 15px;">Profile</a></li>
						<li class="nav-item"><a href="logout.php" class="nav-link" style="font-size: 15px;">LOGOUT</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</section>

	  
<div class="container">
 
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
	  <div class="carousel-inner">
  
		<div class="item active">
		  <img src= "moe.png" alt="Los Angeles" style="justify-content: center;
		  text-align: center;
		  margin: auto;
	  width: 100%;
	  object-fit: cover;
	   height: 550px;">
		  <div class="carousel-caption">
			<h3 style="color: white; font-weight: bold;">Murder on the Orient Express</h3>
			<a href="#" style="color: white; width: 50px; height: 50px; background-color: #ba0001; padding: 8px 5px;">Review</a>

		  </div>
		</div>
  
		<div class="item">
		  <img src="inception.png" alt="Chicago" style="justify-content: center;
		  text-align: center;
		  margin: auto;
	  width: 100%;
	   height: 550px;">
		  <div class="carousel-caption">
			<h3 style="color: black; font-weight: bold;">Inception</h3>
			<a href="#" style="color: white; width: 50px; height: 50px; background-color: #ba0001; padding: 8px 5px;">Review</a>
		  </div>
		</div>
	  
		<div class="item">
		  <img src="imigame.png" alt="New York" style="justify-content: center;
		  text-align: center;
		  margin: auto;
	  width: 100%;
	   height: 550px;">
		  <div class="carousel-caption">
			<h3 style="color: white; font-weight: bold;">Imitation Game</h3>
			<a href="#" style="color: white; width: 50px; height: 50px; background-color: #ba0001; padding: 8px 5px;">Review</a>

		  </div>
		</div>
	
	  </div>
  
	  <!-- Left and right controls -->
	  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
		<span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#myCarousel" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
		<span class="sr-only">Next</span>
	  </a>
	</div>
</div>
<br><br><br>
<div class="container">
        <h2 class="sub-title" style="font-size: 38px; font-weight: bold; font-family: 'Oswald', sans-serif; color: #ec59dc">Latest releases</h2>
        <div class="latest-releases">

            <div class="movie-list-item">
                <img src="mulan.jpg" alt="" class="movie-list-item-image">
                <form action="reviewclickmulan.php" method="post">
                <!-- <input type="hidden"> -->
                <h3 class="movie-list-item-title" name="moviename">Mulan</h3>
                <button class="movie-list-item-button" type="submit">Read Reviews</button>
                </form>

</div>
            <div class="movie-list-item">
                <img src="moonlight.jpg" alt="" class="movie-list-item-image">

                <form action="reviewclickmoon.php" method="post">
                <!-- <input type="hidden"> -->
                <h3 class="movie-list-item-title" name="moviename">Moonlight</h3>
                <button class="movie-list-item-button" type="submit">Read Reviews</button>
                </form>

            </div>
            <div class="movie-list-item">
                <img src="antman.jpg" alt="" class="movie-list-item-image">
                <form action="reviewclickant.php" method="post">
                <!-- <input type="hidden"> -->
                <h3 class="movie-list-item-title" name="moviename">Ant Man</h3>
                <button class="movie-list-item-button" type="submit">Read Reviews</button>
                </form>

            </div>
            <div class="movie-list-item">
                <img src="BohemianRhapsody.png" alt="" class="movie-list-item-image">

                <form action="reviewclickboh.php" method="post">
                <!-- <input type="hidden"> -->
                <h3 class="movie-list-item-title" name="moviename">Bohemian Rhapsody</h3>
                <button class="movie-list-item-button" type="submit">Read Reviews</button>
                </form>

            </div>
            <!-- <div class="movie-list-item">
                <img src="jaws.jpg" alt="" class="movie-list-item-image">

               <form action="reviewclickjaws.php" method="post">
                <h3 class="movie-list-item-title" name="moviename">Jaws</h3>
                <button class="movie-list-item-button" type="submit">Read Reviews</button>
                </form>

            </div> -->
        </div>
<br><br><br><br>
<section class="spinnywheel">
	<div class="spin-wheel">
		<span class="arrow"></span>
		<div class="spin-container">
		<a href="https://www.youtube.com/watch?v=KK8FHdFluOQ"> <div class="one">1</div></a>
                   <a href="https://www.youtube.com/watch?v=P2KRKxAb2ek"> <div class="two">2</div></a>
                   <a href="https://www.youtube.com/watch?v=P2KRKxAb2ek"> <div class="three">3</div></a>
                   <a href="https://www.youtube.com/watch?v=UffVhIixpLA"> <div class="four">4</div></a>
                   <a href="https://www.youtube.com/watch?v=N73oTiIIJe0"> <div class="five">5</div></a>
                   <a href="https://www.youtube.com/watch?v=XcCWBRqWmyw"> <div class="six">6</div></a>
                   <a href="https://www.youtube.com/watch?v=U1fu_sA7XhE"> <div class="seven">7</div></a>
                   <a href="https://www.youtube.com/watch?v=iqxcjD-eAsg"> <div class="eight">8</div></a>
		</div>
		<button id="spin">Spin</button>
	</div>
	<div class="spin-text">
	<div class="spin-text-header1" style="color: blanchedalmond;">ReviewNext</div><br>
	<div class="spin-text-inside"  >Spin the wheel to discover a new movie to watch and review.</div>
</div>
</section>


  



</body>
<script type="text/javascript">
    var counter = 1;
    setInterval(function () {
        document.getElementById('radio' + counter).checked = true;
        counter++;
        if (counter > 4) {
            counter = 1;
        }
    }, 5000);

    function myfunction() {
        var x = 1024;
        var y = 9999;
        var deg = Math.floor(Math.random() * (x - y)) + y;
        document.getElementById('box').style.transform = "rotate(" + deg + "deg)";

        var element = document.getElementById('mainbox');
        element.classList.remove('animate');
        setTimeout(function () {
            element.classList.add('animate');
            var valueList = ["10", "20", "50", "100", "150", "200", "400", "500",];
            var getValue = valueList[Math.floor(Math.random() * valueList.length)];
            // alert(getValue); 
        }, 5000);
    }

    let container = document.querySelector(".spin-container");
    let btn = document.getElementById("spin");
    let number = Math.ceil(Math.random() * 1000);

    btn.onclick = function () {
        container.style.transform = "rotate(" + number + "deg)";
        number += Math.ceil(Math.random() * 1000);
    }

</script>


</html>