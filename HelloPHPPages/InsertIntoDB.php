<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Function 3</title>
</head>
<body>
<?php
    $htmlinput = $_POST['input2'];
    $htmlinput2 = $_POST['input3'];

    echo 'Your html input word is ' . $htmlinput . '&'. $htmlinput2 . '.<br/>';

    if (empty($htmlinput)||empty($htmlinput2)){
        echo 'Your data has some null value!';
    }else{
        $dbc = mysqli_connect('localhost', 'root', 'GZphp1q2w3e4r', 'gzphpdb')
        or die ('Error connectiong to DB server.');
        $query = "INSERT INTO gzphpdb.words (word,word2) values ('$htmlinput','$htmlinput2')";
        $result = mysqli_query($dbc, $query)
        or die('Error querying database.');

        echo 'Data added!';
        mysqli_close($dbc);
    }




?>

</body>
</html>