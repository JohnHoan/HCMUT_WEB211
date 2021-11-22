<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/form_style.css">
    <title>Document</title>
</head>
<body style="margin-top: 60px;">
    <div><h2>Enter user information</h2></div>
    <form action="./add_user" name="add_user" onsubmit="return validateFormAddUser()" method="POST">
        <div class="container">
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <label for="name"><b>Name</b></label>
            <input type="text" placeholder="Enter Name" name="name" required>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>

            <label for="address"><b>Address</b></label>
            <input type="text" placeholder="Enter Address" name="address" required>

            <button type="submit" name="btn_add">Submit</button>
            <button type="button" class="btn-cancel" onclick="window.history.back();">Cancel</button>
        </div>
    </form> 
</body>
</html>