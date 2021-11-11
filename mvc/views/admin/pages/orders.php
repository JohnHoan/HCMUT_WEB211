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
    <div><h2>Orders Management</h2></div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>User</th>						
                <th>Number</th>
                <th>Total Money</th>
                <th>Status</th>
                <th>Note</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['order_list'] as $order){ 
            ?> 
        
            <tr>
                <td><?php echo $order['id']?></td>
                <td><?php echo $order['product']?></td> 
                <td><?php echo $order['user']?></td>
                <td><?php echo $order['number']?></td> 
                <td><?php echo $order['money']?></td>                     
                <td>
                    <form action="./update_paid" method="POST">
                        <input style="display:none;" name="order_id" value=<?= $order['id']?>>
                        <?php 
                            if($order['is_paid']==0){
                                echo "<span class='status text-success'>&bull;</span>","<button name='btn_update' onclick='return confirm('Are you sure you want to do this?');'>Not yet</button>";
                            }else{
                                echo "<span class='status text-danger'>&bull;</span>","Done";
                            }
                        ?>
                    </form>                    
                </td>
                <td><?php echo $order['note']?></td> 
            </tr>
            <?php } ?>
        </tbody>
    </table>
    
</body>
</html>