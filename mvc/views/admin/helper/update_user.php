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
    <div><h2>Edit user information</h2></div>
    <form action="./update_user" method="POST">
        <div class="container">
            <input style="display: none;" type="text" name="user_id" value="<?=$data['user_info']['id']?>">
            <label for="name"><b>Name</b></label>
            <input type="text" placeholder="Enter Name" name="name" value="<?php echo ($data['user_info']['name']);?>" required>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" value="<?php echo ($data['user_info']['email']);?>" required>

            <label for="address"><b>Address</b></label>
            <input type="text" placeholder="Enter Address" name="address" value="<?php echo ($data['user_info']['address']);?>" required>

            <label for="role"><b>Role</b></label>
            <select name="role">
                <option value="0">User</option>
                <option value="1">Admin</option>
            </select>

            <label for="status"><b>Status</b></label>
            <select name="status">
                <option value="0">Active</option>
                <option value="1">Suspend</option>
            </select>

            <button type="submit" name="btn_update">Submit</button>
            <button type="button" class="btn-cancel" onclick="window.history.back();">Cancel</button>
        </div>
    </form> 
</body>
</html>