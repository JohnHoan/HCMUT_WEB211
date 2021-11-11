<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <input type="checkbox" id="nav-toggle" />
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><i class="bx bx-home-alt"></i> <span>
                <?php if(isset( $data['username'])) echo "Hello ".$data['username'];?>
            </span></h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="../DashboardController/index" id="bar-dashboard" >
                        <i class="bx bxs-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="../ProductController/index" id="bar-products">
                        <i class="bx bxl-product-hunt"></i>
                        <span>Products</span>
                    </a>
                </li>
                <li>
                    <a href="../UserController/index" id="bar-customers">
                        <i class="bx bx-user-circle"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="../CommentController/index" id="bar-comments">
                        <i class="bx bxs-comment-detail"></i>
                        <span>Comments</span>
                    </a>
                </li>
                <li>
                    <a href="../OrderController/index" id="bar-orders">
                        <i class="bx bx-money"></i>
                        <span>Orders</span>
                    </a>
                </li>
                <li>
                    <a href="../DashboardController/help" id="bar-help">
                        <i class="bx bx-help-circle"></i>
                        <span>Help</span>
                    </a>
                </li>
                <li>
                    <a href="/web211/LoginController/logout/" id="logout">
                    <i class='bx bx-log-in'></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</body>
</html>