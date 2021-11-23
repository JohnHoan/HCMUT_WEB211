<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fontawesome css -->
    <link rel="stylesheet" type="text/css" href="<?php echo SCRIPT_ROOT.'/public/css/css/font-awesome.min.css';?>">
    <!-- Ionicons css -->
    <link rel="stylesheet" type="text/css" href="<?php echo SCRIPT_ROOT.'/public/css/css/ionicons.min.css';?>">
    <!-- linearicons css -->
    <link rel="stylesheet" type="text/css" href="<?php echo SCRIPT_ROOT.'/public/css/css/linearicons.css';?>">
    <!-- Nice select css -->
    <link rel="stylesheet" type="text/css" href="<?php echo SCRIPT_ROOT.'/public/css/css/nice-select.css';?>">
    <!-- Jquery fancybox css -->
    <link rel="stylesheet" type="text/css" href="<?php echo SCRIPT_ROOT.'/public/css/css/jquery.fancybox.css';?>">
    <!-- Jquery ui price slider css -->
    <link rel="stylesheet" type="text/css" href="<?php echo SCRIPT_ROOT.'/public/css/css/jquery-ui.min.css';?>">
    <!-- Meanmenu css -->

    <link rel="stylesheet" type="text/css" href="<?php echo SCRIPT_ROOT.'/public/css/css/meanmenu.min.css';?>">
    <!-- Nivo slider css -->
    <link rel="stylesheet" type="text/css" href="<?php echo SCRIPT_ROOT.'/public/css/css/nivo-slider.css';?>">
    <!-- Owl carousel css -->
    <link rel="stylesheet" type="text/css" href="<?php echo SCRIPT_ROOT.'/public/css/css/owl.carousel.min.css';?>">
    <!-- Bootstrap css -->

    <link rel="stylesheet" type="text/css" href="<?php echo SCRIPT_ROOT.'/public/css/css/bootstrap.min.css';?>">
    <!-- Custom css -->
    <link rel="stylesheet" type="text/css" href="<?php echo SCRIPT_ROOT.'/public/css/css/default.css';?>">

    <!-- Responsive css -->
    <link rel="stylesheet" type="text/css" href="<?php echo SCRIPT_ROOT.'/public/css/css/responsive.css';?>">

    <!-- Main css -->
    <link rel="stylesheet" type="text/css" href="<?php echo SCRIPT_ROOT.'/public/css/style.css';?>">
    
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

    <?php 
        if(isset($data['pages'])){
            require_once "./mvc/views/user/pages/".$data['pages'].".php";
        }
    ?>

    <?php 
        require_once "./mvc/views/user/components/footer.php";
    ?>
    

</body>
</html>