<?php
include_once "../assets/models/connmyspl.php";
//mysql 事务
header('content-type:text/html;charset=utf-8');


$uid = $_GET["uid"];
$username =  $_GET["username"];
$email = $_GET["email"];
$password = $_GET["password"];
$passwordhash = password_hash($password, PASSWORD_DEFAULT);

//执行增加员工的操作
useradd($mysqli, $uid, $username, $email, $passwordhash);

//useradd() 新增员工
function useradd($mysqli, $uid, $username, $email, $passwordhash)
{
    $sql = "INSERT INTO user(id , username,email,password) VALUES(?,?,?,?)";
    $mysqli_stmt = $mysqli->prepare($sql); //准备预处理语句

    //s 代表 string 类型,i 代表 int
    $mysqli_stmt->bind_param('isss', $uid, $username, $email, $passwordhash);
    //执行预处理语句
    if ($mysqli_stmt->execute()) {
        echo PHP_EOL;
        echo "<script>window.location.href='../useradmin.html'</script>";
    } else {
        echo $mysqli_stmt->error; //执行失败，错误信息
    }
}



$mysqli->close();
