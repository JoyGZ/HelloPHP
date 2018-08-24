<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../BootCSS/bootstrap.css">

    <title>詹姆斯的各种得分信息</title>
</head>
<body>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="../BootJS/jquery-3.3.1.min.js"></script>
<script src="../BootJS/popper.js"></script>
<script src="../BootJS/bootstrap.js"></script>

<!-- Navi Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="./Pics/HomePageLogo.gif" width="75" height="63" class="d-inline-block align-content-center" alt="">
        <b>James Scoreboard</b>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="./LeBronIndex.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./AddJamesInfo.php">AddData </a>
            </li>

        </ul>
    </div>
</nav>

<!-- Actually Content -->

<?php
    //connect to DB
    $dbc=mysqli_connect('localhost','root','GZphp1q2w3e4r','gzphpdb','3306')
        or die('Error with connect to the DB!');
    $query="select * from gzphpdb.James_Info";
    //query DB
    $result=mysqli_query($dbc,$query)
        or die('Error with query DB!');
    echo '<div class="card-columns">';
    $changecount=0;
    while($row=mysqli_fetch_array($result)) {
        $changecount=$changecount+1;
        ?>
            <div class="card">
                <?php
                    if(!empty($row['op_pic'])){
                        ?>
                        <img class="card-img-top" src="./Pics/<?php echo $row['op_pic']; ?>" alt="Card image cap">
                <?php
                    }
                ?>
                <div class="card-body">
                    <h5 class="card-title">O-Player:<?php echo $row['op_name']; ?></h5>
                    <p class="card-text">The O-Player scored <?php echo $row['op_score']; ?> points, but JAMES
                        got <?php echo $row['jscore']; ?> points!!</p>
                    <p class="card-text">
                        <small class="text-muted"><?php echo $row['date'].' '; ?></small>
                        <?php
                        if ( (time() - strtotime($row['date'])) < 18000 ){
                            ?>
                            <span class="badge badge-danger">New!</span>
                        <?php
                        }
                        ?>
                </div>
            </div>
        <?php
            echo '<br/>';
    }
    mysqli_free_result($result);
    mysqli_close($dbc);
    echo '</div>';
?>


</body>

</html>