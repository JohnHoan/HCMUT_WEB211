<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo SCRIPT_ROOT.'/public/css/home.css';?>">
    <link
        href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
        rel="stylesheet"
    />
    <title>Document</title>
</head>
<body>
    <?php 
        require_once "./mvc/views/user/components/header.php";
    ?>
    <div class="main-content">
        <?php 
            if(isset($data['pages'])){
                require_once "./mvc/views/user/pages/".$data['pages'].".php";
            }
        ?>
    </div>
    <?php 
        require_once "./mvc/views/user/components/footer.php";
    ?>
</body>
</html>