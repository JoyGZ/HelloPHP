<?php
require_once('VarModel/Authorize.php')
?>
<?php
    /**
     * Created by PhpStorm.
     * User: JoyGZ
     * Date: 2018/8/27
     * Time: 下午3:00
     */
    require_once('VarModel/headpart.html');
    require_once('VarModel/PreVars.php');
?>

<?php
    //init for remove-jump op
    if(isset($_GET['id'])){
        $jid = $_GET['id'];
    }else if (isset($_POST['jid'])){
        $jid = $_POST['jid'];
        $jpic = $_POST['jpic'];
    //init for submit op
        }else{
        echo 'error with this function!';
    }

    //delete the data
    if(isset($_POST['submit'])){
        //connect to DB
        $dbc=mysqli_connect(db_host,db_user,db_password,db_name,db_port)
        or die('Error with connect to the DB!');
        $query="UPDATE gzphpdb.James_Info SET ojbk= 'Y' WHERE jid = $jid";
        //query DB
        $result=mysqli_query($dbc,$query)
        or die('Error with query DB!');
        @unlink(ULJPICPATH.$jpic);
        ?>
        <div style="width: 95%;">
            <div class="alert alert-success" role="alert">
                <strong>Well done!</strong> You successfully validate this data in DB.
            </div>
        </div>
        <?php

    }else if (isset($_GET['id'])){
        $dbc=mysqli_connect(db_host,db_user,db_password,db_name,db_port)
        or die('Error with connect to the DB!');
        $query="select * from gzphpdb.James_Info where jid=$jid";
        //query DB
        $result=mysqli_query($dbc,$query)
        or die('Error with query DB!');
        ?>
        <div style="text-align: center">
            <label><strong>Please Comfirm the data:</strong></label>
        </div>

    <?php
        echo '<div class="card-columns">';
        $row=mysqli_fetch_array($result);
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
            <form method="post" action="ValidateJamesInfo.php">
                <input type="hidden" name="jid" value="<?php echo $row['jid']; ?>">
                <input type="hidden" name="jpic" value="<?php echo $row['op_pic'] ?>">
                <div class="form-row">
                    <div class="my-center-form" style="margin: 0 auto">
                        <input class="btn btn-primary" type="submit" value="Validate Data" name="submit">
                    </div>
                </div>
            </form>
            <?php

            echo '<br/>';
            mysqli_free_result($result);
            mysqli_close($dbc);
            echo '</div>';
    }


?>

<?php
    require_once('VarModel/endpart.html');
?>
