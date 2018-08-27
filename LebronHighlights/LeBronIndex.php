<?php
require_once('headpart.html');
?>

<!-- Actually Content -->

<?php
    require_once('PreVars.php');
    //connect to DB
    $dbc=mysqli_connect(db_host,db_user,db_password,db_name,db_port)
        or die('Error with connect to the DB!');
    $query="select * from gzphpdb.James_Info";
    //query DB
    $result=mysqli_query($dbc,$query)
        or die('Error with query DB!');
    echo '<div class="card-columns">';
    while($row=mysqli_fetch_array($result)) {
        ?>
            <div class="card">
                <?php
                    if((!empty($row['op_pic']))||(!($row['op_pic']==''))){
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

<?php
require_once('endpart.html');
?>
