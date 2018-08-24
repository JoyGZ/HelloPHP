<?php
/**
 * Created by PhpStorm.
 * User: JoyGZ
 * Date: 2018/8/21
 * Time: 下午3:20
 */

    if (isset($_POST['submit'])) {
        $word1 = $_POST['word1'];
        $word2 = $_POST['word2'];
        $disform = true;

        if (empty($word1) && empty($word2)) {
            echo 'All is empty, please input again!<br>';
        } elseif (empty($word1) && (!empty($word2))) {
            echo 'You should input word1!<br>';
        } elseif ((!empty($word1)) && empty($word2)) {
            echo 'You should input word2!<br>';
        } elseif ((!empty($word1)) && (!empty($word2))) {
            echo 'All right!';
            $disform = false;

            $dbc=mysqli_connect('localhost','root','GZphp1q2w3e4r','gzphpdb','3306')
            or die('Error with connect to the DB!');
            $query="insert into gzphpdb.words (word, word2) VALUES ('$word1','$word2')";
            $result=mysqli_query($dbc,$query)
            or die('Error with insert data into database!');
            mysqli_close($dbc);
        }
    }else{
        $disform = true;
        $word1='';
        $word2='';
        ?>
        <h1>New Input Data Page!</h1>
        <?php
    }

    if($disform==true){
        ?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label>Please input your Words...</label><br><br>
            <label for="word1">The 1st word:</label>
            <input type="text" name="word1" id="word1" value="<?php echo $word1;?>"/><br>
            <label for="word2">The 2nd word:</label>
            <input type="text" name="word2" id="word2" value="<?php echo $word2;?>"/><br>
            <input type="submit" name="submit" value="Insert!"/>
        </form>
<?php
    }
?>
