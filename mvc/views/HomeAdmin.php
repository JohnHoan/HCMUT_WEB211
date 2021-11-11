<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/admin_home.css" />
    <link
        href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
        rel="stylesheet"
    />
    <title>Document</title>
</head>
<body>
    <?php 
        require_once "./mvc/views/admin/components/sidebar.php";
        require_once "./mvc/views/admin/components/header.php";
    ?>
    <div class="main-content">  
        <main>
            <?php 
                if(isset($data['pages'])){
                    require_once "./mvc/views/admin/pages/".$data['pages'].".php";
                }
                else if(isset($data['helper'])){
                    require_once "./mvc/views/admin/helper/".$data['helper'].".php";
                }
            ?>
        </main>
    </div>
</body>
</html>