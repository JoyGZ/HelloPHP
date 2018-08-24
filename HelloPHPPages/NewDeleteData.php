<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>1st Try</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <?php
    /**
     * Created by PhpStorm.
     * User: JoyGZ
     * Date: 2018/8/22
     * Time: 上午10:05
     */

        //fisrt connect to db
        $dbc=mysqli_connect('localhost','root','GZphp1q2w3e4r','gzphpdb','3306')
            or die('Error with connect to the DB!');

        //get and delete data
        if(isset($_POST['submit'])){
            foreach ($_POST['deleteId'] as $deleteId) {
                $query="delete from gzphpdb.words where id='$deleteId'";
                mysqli_query($dbc,$query)
                    or die('Error with delete data!');
            }
            echo 'Data has already cleaned!<br>';
        }

        //query data from DB
        $query="select * from gzphpdb.words";
        $result=mysqli_query($dbc,$query)
            or die('Error with query DB!');

        //draw the table
        $table="<table border='0' cellpadding='0' cellspacing='0' width='50%'>";
        while ($row=mysqli_fetch_array($result)){
            $table.="<tr>";
            $table.='<td><input type="checkbox" value="'.$row['id'].'"name="deleteId[]" /></td>';
            $table.='<td>'.$row['word'].'</td>';
            $table.='<td>'.$row['word2'].'</td>';
            $table.="</tr>";
        }
        echo $table.'</table>';

        mysqli_free_result($result);
        mysqli_close($dbc);
        ?>
        <label>Check the data you want to delete:</label><br>
        <input type="submit" value="delete data" name="submit" />
    </form>
</body>
</html>