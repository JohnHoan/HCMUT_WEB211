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
    <div><h2>Comment Management</h2></div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>User</th>						
                <th>Content</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- <?php foreach($data['comment_list'] as $comment){ 
            ?>  -->
        
            <tr>
                <td><?php echo $comment['id']?></td>
                <td><?php echo $comment['product']?></td> 
                <td><?php echo $comment['user']?></td>
                <td><?php echo $comment['content']?></td>                    
                <td>
                    <form action="./hide_comment" method="POST">
                        <input style="display: none;" type="text" name="comment_id" value="<?=$comment['id']?>">
                        <button class="btn-hide" style=" border: 2px black solid;
                                                        padding: 2px;
                                                        border-radius: 5px;
                                                        font-size: 15px;
                                                        background-color: gray;
                                                        float: left;" 
                        name="btn_hide" onclick="return confirm('Are you sure you want to hide this comment?');">Hide</button>
                    </form>                 
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    
</body>
</html>