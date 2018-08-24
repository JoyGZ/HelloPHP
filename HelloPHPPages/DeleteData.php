<?php
/**
 * Created by PhpStorm.
 * User: JoyGZ
 * Date: 2018/8/21
 * Time: 下午12:48
 */
$delkeyword = $_POST['keyid'];

$dbc=mysqli_connect('localhost','root','GZphp1q2w3e4r','gzphpdb','3306')
or die('Error with connect to the DB!');

$query="DELETE FROM gzphpdb.words where id='$delkeyword' ";

$result=mysqli_query($dbc,$query)
or die('Error with query database');

echo 'Delete Finished!';

mysqli_close($dbc);