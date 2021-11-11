<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/table_style.css">
    <title>Document</title>
</head>
<body>
    <!-- <?php print_r($data['user_list'])?> -->
    <div><h2>Users Management</h2></div>
    <div>
        <a class="btn-add" href="../UserController/add_user">Add user</a>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>						
                <th>Email</th>
                <th>Address</th>
                <th>Role</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['user_list'] as $user){ 
                extract($user);
            ?> 
            
            
            <tr>
                <td><?php echo $user['id']?></td>
                <td><?php echo $user['name']?></td> 
                <td><?php echo $user['email']?></td>
                <td><?php echo $user['address']?></td>                      
                <td>
                    <?php 
                        if($user['roles']==1) echo "Admin";
                        else {echo "User";}
                    ?>
                </td>
                <td>
                    <?php 
                        if($user['is_deleted']==0){
                            echo "<span class='status text-success'>&bull;</span>","Active";
                        }else{
                            echo "<span class='status text-danger'>&bull;</span>","Suspended";
                        }
                    ?>
                    
                
                </td>
                <td>
                    <form action="../UserController/update_user" method="POST"  class="btn">
                        <input style="display: none;" type="text" name="user_id" value="<?=$user['id']?>">
                        <button class="btn-edit" name="btn_edit">Edit</button> 
                        <button class="btn-delete" name="btn_delete" onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>