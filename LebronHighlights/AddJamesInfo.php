<?php
    require_once('VarModel/headpart.html');
?>
<!-- Actually Content -->
<?php
    if (isset($_POST['JData'])){
        $oname = $_POST['inputOname'];
        $oscore = $_POST['inputOscore'];
        $jsocre = $_POST['inputJscore'];
        $jpic = $_FILES['customFile']['name'];

        //pic鉴别是否正确
        $picflag = 0;
        //上传路径变量
        require_once('VarModel/PreVars.php');


        if ((!empty($oname))&&(!empty($oscore))&&(!empty($jsocre))){
            if (!empty($jpic)){
                if($_FILES['customFile']['size']<25000){
                    $picflag=1;
                    echo 'Error with upLoad pictures, the picture is too small!';
                }
                if($_FILES['customFile']['type']!='image/jpeg'&&$_FILES['customFile']['type']!='image/jpg'){
                    $picflag=1;
                    echo 'Error with upLoad pictures, the picture format is error!';
                }
                $target =  ULJPICPATH.$jpic;
                if($picflag != 1){
                    if(!(move_uploaded_file($_FILES['customFile']['tmp_name'],$target))){
                        $picflag=1;
                        echo 'Error with upLoad pictures!';
                    }
                }
            }
            if (!is_numeric($oscore)||!is_numeric($jsocre)||is_numeric($oname)){
                echo '<div class="alert alert-warning" role="alert">Error with input format!</div>';
                $picflag=1;
            }
            if ($picflag != 1){
                $dbc=mysqli_connect(db_host,db_user,db_password,db_name,db_port)
                or die('Error with connect to the DB!');
                $query="insert into gzphpdb.James_Info (op_name, op_score, jscore, op_pic) VALUES ('$oname','$oscore','$jsocre','$jpic')";
                //query DB
                $result=mysqli_query($dbc,$query)
                or die('Error with query DB!');
                ?>
                <div style="text-align: center">
                    <label>Thanks for add data!</label>
                    <label>You data is <?php echo "$oname & $oscore & $jsocre , right? "?></label>
                </div>
                <?php
                $oname="";
                $oscore="";
                $jsocre="";
                $jpic="";

                @unlink($_FILES['customFile']['tmp_name']);
                mysqli_close($dbc);
            }
        }else{
            ?>
            <div style="text-align: center">
                <label>Please input all data!</label>
            </div>
            <?php
        }
    }
?>
<!-- Form Part-->
<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="form-row">
        <div class="my-center-form col-md-6">
            <label for="inputOname">The opposition sides's player name:</label>
            <input type="text" class="form-control" id="inputOname" name="inputOname"
            placeholder="O-Player Name" value="<?php if (!empty($oname)){echo $oname;} ?>">
        </div>
    </div>
    <div class="form-row">
        <div class="my-center-form col-md-6">
            <label for="inputOscore">The opposition sides's player score:</label>
            <input type="text" class="form-control" id="inputOscore" name="inputOscore"
                   placeholder="O-Player Score" value="<?php if (!empty($oscore)){echo $oscore;} ?>">
        </div>
    </div>
    <div class="form-row">
        <div class="my-center-form col-md-6">
            <label for="inputJscore">James score:</label>
            <input type="text" class="form-control" id="inputJscore" name="inputJscore"
                   placeholder="James Score" value="<?php if (!empty($jsocre)){echo $jsocre;} ?>">
        </div>
    </div>
    <div class="form-row">
        <div class="my-center-form col-md-6">
            <label>Upload picture:</label>
        </div>
    </div>
    <div class="custom-file col-md-6" style="width: 95%">
        <input type="file" class="custom-file-input" id="customFile" name="customFile">
        <label class="custom-file-label" for="customFile">Choose James's Picture:</label>
    </div>
    <?php
    echo '<br>';
    echo '<br>';
    ?>
    <div class="form-row">
        <div class="my-center-form col-md-6">
        <input class="btn btn-primary" type="submit" value="Add Data" name="JData">
        </div>
    </div>

</form>


<?php
require_once('VarModel/endpart.html');
?>