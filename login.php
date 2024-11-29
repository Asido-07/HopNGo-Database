<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Booking</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="assets/css/responsive.css">
    <style>
        /* Styling for the login container */
        .login-container {
            background: #f8f9fa;
            padding: 60px 0;
        }
        .login-form {
            background: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .login-form h2 {
            font-family: 'Poppins', sans-serif;
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }
        .login-form .form-group label {
            font-weight: 600;
            font-size: 14px;
            color: #555;
        }
        .login-form .form-control {
            border-radius: 5px;
            height: 45px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
            padding: 0 15px;
        }
        .login-form .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
        .login-form .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px 30px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .login-form .btn-primary:hover {
            background-color: #0056b3;
        }
        .login-form p {
            margin-top: 15px;
            color: #666;
        }
        .login-form p a {
            color: #007bff;
            text-decoration: none;
        }
        .login-form p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.html">
								<img src="Booking-logo.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="current-list-item"><a href="index.html">Home</a></li>
								<li><a href="about.html">About</a></li>
								<li><a href="contact.html">Contact</a></li>
								<li><a href="shop.html">Booking</a></li>
								<li>
									<div class="header-icons">
										<a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
										<a href="login.php" class="boxed-btn">Login</a>
									</div>
								</li>
							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->

	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fast and Reliable</p>
						<h1>Booking</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- login container -->
	<div class="login-container">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-8">
					<div class="login-form">
						<h2>Login</h2>
						<?php
							if ($_SERVER['REQUEST_METHOD'] == 'POST') {
								// Database connection
								$conn = new mysqli('localhost', 'root', '', 'lugan');

								// Check connection
								if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
								}

								// Retrieve form data
								$email = $_POST['email'];
								$password = $_POST['password'];

								// Query to check login credentials
								$sql = "SELECT * FROM login WHERE email = ? AND password = ?";
								$stmt = $conn->prepare($sql);
								$stmt->bind_param("ss", $email, $password);
								$stmt->execute();
								$result = $stmt->get_result();

								if ($result->num_rows > 0) {
									echo "<div class='alert alert-success'>Login successful!</div>";
									// Redirect to another page or user dashboard
									header("Location: dashboard.php");
									exit();
								} else {
									echo "<div class='alert alert-danger'>Invalid email or password!</div>";
								}

								// Close connection
								$stmt->close();
								$conn->close();
							}
						?>
						<form action="login.php" method="post">
							<div class="form-group">
								<label for="email">Email:</label>
								<input type="email" class="form-control" id="email" name="email" required>
							</div>
							<div class="form-group">
								<label for="password">Password:</label>
								<input type="password" class="form-control" id="password" name="password" required>
							</div>
							<button type="submit" class="btn btn-primary">Login</button>
						</form>
						<p class="mt-3">Don't have an account? <a href="register.php">Register here</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end login container -->
	
	<!-- jquery -->
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- main js -->
	<script src="assets/js/main.js"></script>

</body>
</html>
