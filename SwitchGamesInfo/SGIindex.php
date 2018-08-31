<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/HelloPHP/BootCSS/bootstrap.css">

    <title>Switch游戏信息系统</title>
</head>
<body>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="/HelloPHP/BootJS/jquery-3.3.1.min.js"></script>
<script src="/HelloPHP/BootJS/popper.js"></script>
<script src="/HelloPHP/BootJS/bootstrap.js"></script>

<!-- Login Info -->
<div class="alert alert-warning" role="alert">
    Please login and you can see more info!
</div>
<div class="alert alert-primary" role="alert">
    Your user name is xxxx.
</div>
<!-- NaviBar zone-->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <!-- Icon and text -->
        <a class="navbar-brand" href="#">
            <img src="/HelloPHP/SwitchGamesInfo/Pics/icon.jpg" width="50" height="50" class="d-inline-block" alt="">
            <div class="my-center-vert">
                <span style="color: #ff0041;">S</span>GI  System
            </div>
        </a>
    <!-- Mobile View Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Funcs -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

</body>
</html>