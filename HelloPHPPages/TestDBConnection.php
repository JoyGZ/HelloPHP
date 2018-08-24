<?php

/**
 * Created by PhpStorm.
 * User: JoyGZ
 * Date: 2018/8/20
 * Time: 上午10:07
 */

$conn = mysqli_connect("localhost", "root", "GZphp1q2w3e4r");
if ($conn) {
    echo "连接mysql数据库ok";
} else {
    echo "连接mysql数据库失败";
}

?>
