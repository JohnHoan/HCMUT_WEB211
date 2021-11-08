<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle"
                    ><i class="bx bxs-dashboard"></i
                ></label>
                Dashboard
            </h2>
            <div class="search-wrapper">
                <i class="bx bx-search-alt-2"></i>
                <input type="search" placeholder="Search" />
            </div>
            <div class="user-wrapper">
                <img
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR6SuPNu_RXRJu3HT4QLaMf6JUlPyDhMmPTbA&usqp=CAU"
                    alt=""
                    width="40px"
                    height="40px"
                />
                <div>
                    <h4><?php if(isset( $data['username'])) echo $data['username'];?></h4>
                    <small>Admin</small>
                </div>
            </div>
        </header>
    </div>
</body>
</html>