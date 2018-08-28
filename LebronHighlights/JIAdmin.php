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
    ?>
<div style="text-align: center">
    <h2>JI Admin System<span class="badge badge-secondary">New</span></h2>
</div>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">oName</th>
            <th scope="col">oScore</th>
            <th scope="col">date</th>
            <th scope="col">ops</th>
        </tr>
    </thead>
    <tbody>
    <?php
        require_once('VarModel/PreVars.php');
        //connect to DB
        $dbc=mysqli_connect(db_host,db_user,db_password,db_name,db_port)
        or die('Error with connect to the DB!');
        $query="select * from gzphpdb.James_Info";
        //query DB
        $result=mysqli_query($dbc,$query)
        or die('Error with query DB!');

    while($row=mysqli_fetch_array($result)) {
    ?>
        <tr>
            <th scope="row"><?php echo $row['jid']; ?></th>
            <td><?php echo $row['op_name']; ?></td>
            <td><?php echo $row['op_score']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><a href="RemoveJamesInfo.php?id=<?php echo $row['jid'];?>">remove</a>
                <?php
                    if ($row['ojbk']!='N'){
                ?>
                 / <a href="ValidateJamesInfo.php?id=<?php echo $row['jid'];?>">validate</a></td>
            <?php
            }
            ?>
        </tr>
        <?php
    }
        ?>
    </tbody>
</table>

<?php
    require_once('VarModel/endpart.html');
?>