<?php
/**
 * Created by PhpStorm.
 * User: JoyGZ
 * Date: 2018/8/28
 * Time: 上午10:57
 */
    //user authentication
    $username='wang';
    $password='health';
//    if(!isset($_SERVER['PHP_AUTH_USER'])){
//        $_SERVER['PHP_AUTH_USER'] = '';
//    }
    if(!isset($_SERVER['PHP_AUTH_USER'])||!isset($_SERVER['PHP_AUTH_PW'])||
        $_SERVER['PHP_AUTH_USER']!=$username || $_SERVER['PHP_AUTH_PW']!= $password){
        {
            //incorrect so send the authentication headers
            header('HTTP/1.1 401 Unauthorized');
            header('WWW-Authenticate:Basic realm="JAMES INFO SYSTEM');
            exit('This is a danger alert—check it out!');
        }
    }
?>