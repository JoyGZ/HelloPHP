<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../BootCSS/bootstrap.css">

    <title>Hello, world!</title>
</head>
<body>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="../BootJS/jquery-3.3.1.min.js"></script>
<script src="../BootJS/popper.js"></script>
<script src="../BootJS/bootstrap.js"></script>


<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">欢迎你!</h4>
    <p>这是一个测试工程，之前只是想着用来练习图片和ß各类数据库相关的php操作，但是还是想让它有一点点意义。</p>
    <p class="mb-0">如果你也感兴趣，点击这里录入@KingJames相关的比赛信息吧！</p>
</div>
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
                        <small class="text-muted"><?php echo $row['date']; ?></small>
                    </p>
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