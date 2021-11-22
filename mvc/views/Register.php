<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="../public/css/register.css">

	<title>Register Form</title>
</head>
<body>
	<div class="container">
		<form action="./register_handler" name="register_form" onsubmit="return validateFormRegister()" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" id="username" required>
			</div>
			<div id="mgs" style="color: red;"></div>
            <div class="input-group">
				<input type="password" placeholder="Password" name="password" required >
            </div>
            <div class="input-group">
				<input type="text" placeholder="Name" name="name" required >
			</div>
            <div class="input-group">
				<input type="email" placeholder="Email" name="email" required>
			</div>
            <div class="input-group">
				<input type="text" placeholder="Adress" name="address" required>
			</div>
			<div class="input-group">
				<button name="btn_register" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="./index">Login Here</a>.</p>
		</form>
	</div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../public/js/main.js"></script>
	<script src="../public/js/validation.js"></script>
</body>
</html>