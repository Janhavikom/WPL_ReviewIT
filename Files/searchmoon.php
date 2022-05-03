<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="file:///C:/fontawesome-free-5.13.0-web/css/all.css">
	<!-- <link rel="stylesheet" type="text/css" href="moviereviews.css"> -->
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

	<title>Trying review page</title>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Oswald:wght@300&family=Signika+Negative:wght@300&display=swap');
		@import url('https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Lato&family=Oswald:wght@300&family=Signika+Negative:wght@300&display=swap');

		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: 'poppins', sans-serif;
			/* background-color: black; */
		}

		section {
			position: relative;
			min-height: 100vh;
			width: 100%;
			background: #10052b;
			overflow: hidden;
		}

		section .heading {
			display: inline-block;
			position: relative;
			color: #ec59dc;
			font-size: 4vw;
			padding: 60px;
			width: 100%;
			text-align: center;
			font-weight: 800;
			font-family: 'Oswald', sans-serif;
		}

		section .heading:before {
			position: absolute;
			content: '';
			width: 15%;
			height: 7px;
			left: 50%;
			transform: translateX(-50%);
			bottom: 25%;
			background: #32d0f5;
		}

		section .heading b {
			color: #fff;
		}

		.name {
			color: white;
			text-shadow: 2px 2px 5px #f6ad34;
			font-size: 30px;
			text-align: center;
			background-color: #531bce;
		}

		.wrapper {
			width: 100%;
			display: flex;
			justify-content: center;
			flex-wrap: wrap;
			text-align: center;
		}

		.wrapper .container {
			position: relative;
			width: 350px;
			color: #fff;
			background: #222;
			margin: 40px 10px;
			padding: 30px 20px;
			border-radius: 3px;
			transition: 0.3s ease;
		}

		.wrapper .container .profile {
			position: absolute;
			left: 50%;
			transform: translateX(-50%);
			top: -10%;
			width: 100%;
			display: block;
		}

		.wrapper .container .profile .imgBox {
			position: relative;
			height: 100px;
			width: 100px;
			margin: auto;
			border: 8px solid #070c0d;
			border-radius: 50%;
			overflow: hidden;
		}

		.wrapper .container .profile .imgBox img {
			position: absolute;
			height: 100%;
			width: 100%;
			top: 0;
			left: 0;
			border-radius: 50%;
			object-fit: cover;
			transition: 0.3s ease;
		}

		.wrapper .container .profile .imgBox:hover img {
			filter: saturate(140%);
			transform: scale(0.95);
		}

		.wrapper .container .profile h2 {
			padding: 5px 0;
			text-transform: capitalize;
			color: #fff;
			letter-spacing: 1px;
			text-align: center;
		}

		.wrapper .container p {
			margin-top: 50px;
			color: #fff;
			padding: 0 8px;
			font-size: 15px;
			opacity: 0.8;
		}

		.wrapper .container .left {
			font-size: 30px;
			display: block;
			text-align: left;
			color: #3b7cf5;
		}

		.wrapper .container .right {
			font-size: 30px;
			display: block;
			text-align: right;
			color: #3b7cf5;
		}

		.wrapper .container .social {
			width: 100%;
		}

		.wrapper .container .social i {
			font-size: 1.2em;
			color: #fff;
			padding: 8px;
			background: rgba(255, 255, 255, 0.08);
			border-radius: 4px;
			box-shadow: 0 4px 4px rgba(0, 0, 0, 0.5);
		}

		.wrapper .container .social i:hover {
			background: #3b7cf5;
		}


		.rate-box {
			justify-content: center;
			text-align: center;
			margin: auto;
			width: 50%;
			padding: 10px;
		}


		.body-review {
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
			#review {
				display: flex;
				justify-content: center;
				align-items: center;
				flex-direction: column;
				width: 100%;
			}

			.review-box-container {
				display: flex;
				justify-content: center;
				align-items: center;
				flex-wrap: wrap;
				width: 100%;
			}

			.review-box {
				width: 500px;
				background-color: #222;
				padding: 20px;
				margin: 15px;
				cursor: pointer;
				height: 180px;
			}

			.profile-img {
				width: 50px;
				height: 50px;
				border-radius: 50%;
				overflow: hidden;
				margin-right: 10px;
			}

			.profile-img img {
				width: 100%;
				height: 100%;
				object-fit: cover;
				object-position: center;
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

			.box-top {
				display: flex;
				justify-content: space-between;
				align-items: center;
				margin-bottom: 20px;
			}

			.client-comment {
				font-size: 0.9rem;
				color: rgb(219, 204, 204);
			}


			form header {
				width: 100%;
				font-size: 25px;
				color: #fe7;
				font-weight: 500;
				margin: 5px 0 20px 0;
				text-align: center;
				transition: all 0.2s ease;
			}

			form .textarea {
				height: 100px;
				width: 100%;
				overflow: hidden;
			}

			form .textarea textarea {
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

			.textarea textarea:focus {
				border-color: #444;
			}

			form .moviename {
				height: 45px;
				width: 100%;
				overflow: hidden;
			}

			form .moviename textarea {
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

			.moviename textarea:focus {
				border-color: #444;
			}

			form .btn {
				height: 45px;
				width: 100%;
				margin: 15px 0;
			}

			form .btn button {
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

			form .btn button:hover {
				background: #1b1b1b;
			}

			.result-text{
				color: white;
			}
		
	</style>
</head>

<body>
	<?php
	include_once 'navreviews.php';
	?>

	<section>
		<br>
		<div class="heading">Write a Review</div>
		<br><br><br><br>
		<div class="body-review ">
			<form action="#" method="POST">
				<div class="rateyo rate-box" id="rating" data-rateyo-rating="4" data-rateyo-num-stars="5"
					data-rateyo-score="3">
				</div>
				<span class='result result-text'>0</span>
				<input type="hidden" name="rating">
				<!-- <div class="moviename">
					<textarea cols="10" placeholder="Movie Name" name="moviename"></textarea>
				</div><br> -->
				<div class="textarea">
					<textarea cols="30" placeholder="Write a Review" name="reviews"></textarea>
				</div>
				<div class="btn">
					<button type="submit" name="add">Post</button>
				</div>
			</form>
		</div>
        <br><br><br><br>

		<script>
			$(function () {
				$(".rateyo").rateYo().on("rateyo.change", function (e, data) {
					var rating = data.rating;
					$(this).parent().find('.score').text('score :' + $(this).attr('data-rateyo-score'));
					$(this).parent().find('.result').text('rating :' + rating);
					$(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
				});
			});

		</script>
		<?php
		include_once 'config.php';
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$username = $_SESSION["username"];
			$moviename = "Moonlight";
			$reviews = $_POST["reviews"];
			$rating = $_POST["rating"];
		
			$sql = "INSERT INTO review_table (username,moviename,reviews,rating) VALUES ('$username','$moviename','$reviews','$rating')";
			if (mysqli_query($conn, $sql))
			{
				
			}
			else
			{
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			// mysqli_close($conn);
		}
		?>
	</section>









</body>



</html>