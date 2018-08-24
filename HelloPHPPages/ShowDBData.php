<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>1st Try</title>
</head>

<body>

<?php
/**
 * Created by PhpStorm.
 * User: JoyGZ
 * Date: 2018/8/21
 * Time: 上午10:53
 */
$dbc=mysqli_connect('localhost','root','GZphp1q2w3e4r','gzphpdb','3306')
or die('Error with connect to the DB!');

$query="select * from gzphpdb.words";

$result=mysqli_query($dbc,$query)
or die('Error with query database');


$table="<table border='0' cellpadding='0' cellspacing='0' width='50%'>";
while ($row=mysqli_fetch_array($result)){
    $table.="<tr>";
    $table.='<td>'.$row['id'].'</td>';
    $table.='<td>'.$row['word'].'</td>';
    $table.='<td>'.$row['word2'].'</td>';
    $table.="</tr>";
}
$table.="</table>";
echo $table;

echo 'Print Finished!';

mysqli_free_result($result);
mysqli_close($dbc);

?>
<br><br>
<label>Input the id that you want to delete:</label>
<form method="post" name="deletedata" action="DeleteData.php">
    <input type="text" name="keyid" id="dele" />
    <input type="submit" name="submit" value="delete!" />
</form>

</body>

</html>
